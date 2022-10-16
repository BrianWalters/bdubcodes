<?php

namespace App\Nba;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NbaData
{
    public function __construct(private HttpClientInterface $client, private CacheItemPoolInterface $cache)
    {
    }

    /**
     * @return array<string, TeamRecord>
     */
    public function getTeamRecords(): array
    {
        $cacheItem = $this->cache->getItem('standings');

        if (!$cacheItem->isHit()) {
            $response = $this->client->request(
                'GET',
                'https://stats.nba.com/stats/leaguestandingsv3?LeagueID=00&Season=2022-23&SeasonType=Regular%20Season',
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

            $decoded = json_decode($response->getContent(), true);

            $teamRecords = array_map(fn(array $row) => $this->makeTeamRecordFromRow($row), $decoded['resultSets'][0]['rowSet']);

            $teamRecordsHash = [];

            foreach ($teamRecords as $teamRecord) {
                $teamRecordsHash[$teamRecord->getName()] = $teamRecord;
            }

            $cacheItem->set($teamRecordsHash);
            $cacheItem->expiresAfter(\DateInterval::createFromDateString('24 hours'));
            $this->cache->save($cacheItem);
        }

        return $cacheItem->get();
    }

    private function makeTeamRecordFromRow(array $row): TeamRecord
    {
        return new TeamRecord(
            $row[3] . ' ' . $row[4],
            $row[13],
            $row[14]
        );
    }
}