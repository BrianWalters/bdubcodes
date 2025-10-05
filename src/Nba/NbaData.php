<?php

namespace App\Nba;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NbaData
{
    public function __construct(private HttpClientInterface $client, private CacheItemPoolInterface $cache)
    {
    }

    public function getLatestSeasonTeamRecords(): array
    {
        $cacheItem = $this->cache->getItem('standings');

        if (!$cacheItem->isHit()) {
            $response = $this->client->request(
                'GET',
                'https://stats.nba.com/stats/leaguestandingsv3?LeagueID=00&Season=2024-25&SeasonType=Regular%20Season',
                [
                    'headers' => [
                        'Host' => 'stats.nba.com',
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv=>72.0) Gecko/20100101 Firefox/72.0',
                        'Accept' => 'application/json, text/plain, */*',
                        'Accept-Language' => 'en-US,en;q=0.5',
                        'x-nba-stats-origin' => 'stats',
                        'x-nba-stats-token' => 'true',
                        'Connection' => 'keep-alive',
                        'Referer' => 'https://stats.nba.com/',
                        'Pragma' => 'no-cache',
                        'Cache-Control' => 'no-cache',
                    ]
                ]
            );

            $content = $response->getContent();

            $decoded = json_decode($content, true);

            $teamRecordsHash = self::makeTeamRecordsFromNbaData($decoded);

            $cacheItem->set([
                'teamRecords' => $teamRecordsHash,
                'time' => new \DateTime(),
            ]);
            $cacheItem->expiresAfter(\DateInterval::createFromDateString('20 minutes'));
            $this->cache->save($cacheItem);
        }

        return $cacheItem->get();
    }

    public function get2022023SeasonData(): array
    {
        return self::makeTeamRecordsFromNbaData(json_decode(file_get_contents(__DIR__ . "/nba20222023.json"), true));
    }

    public function get20232024SeasonData(): array
    {
        return self::makeTeamRecordsFromNbaData(json_decode(file_get_contents(__DIR__ . "/nba20232024.json"), true));
    }

    public function get20242025SeasonData(): array
    {
        return self::makeTeamRecordsFromNbaData(json_decode(file_get_contents(__DIR__ . "/nba20242025.json"), true));
    }

    public static function makeTeamRecordsFromNbaData(array $nbaData): array
    {
        $teamRecords = array_map(fn(array $row) => self::makeTeamRecordFromRow($row), $nbaData['resultSets'][0]['rowSet']);

        $teamRecordsHash = [];

        foreach ($teamRecords as $teamRecord) {
            $teamRecordsHash[$teamRecord->getName()] = $teamRecord;
        }

        return $teamRecordsHash;
    }

    private static function makeTeamRecordFromRow(array $row): TeamRecord
    {
        return new TeamRecord(
            $row[3] . ' ' . $row[4],
            $row[13],
            $row[14]
        );
    }
}