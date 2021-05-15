<?php


namespace App\Services\GoogleAnalytics;

use Spatie\Analytics\AnalyticsFacade as Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class GoogleAnalyticsService
{
    protected $maxResult = 10;

    public function getMostVisited($period)
    {
        $mostVisitedPage = Analytics::fetchMostVisitedPages($period, $this->maxResult);
        return $mostVisitedPage;
    }

    public function getTotalVisitors($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $totalVisitors = Analytics::fetchTotalVisitorsAndPageViews($period);
        return $totalVisitors;
    }

    public function getUserType($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $userType = Analytics::fetchUserTypes($period);
        return $userType;
    }

    public function getTopBrowser($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $topBrowser = Analytics::fetchTopBrowsers($period);
        return $topBrowser;
    }


    public function getSessionsAndPageViews($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $response = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );

        return collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'sessions' => (int)$pageRow[1],
                    'page_views' => (int)$pageRow[2],
                ];
            });
    }

    public function getMobileTraffic($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $response = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:mobileDeviceInfo,ga:source',
                'metrics' => 'ga:sessions,ga:pageviews,ga:sessionDuration',
                'segment' => 'gaid::-14',
                'max-results' => $this->maxResult,
            ]
        );
        $mobileTraffic = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'device_info' => $pageRow[0],
                    'source' => $pageRow[1],
                    'sessions' => (int)$pageRow[2],
                    'page_views' => (int)$pageRow[3],
                    'session_duration' => (int)$pageRow[4],
                ];
            });
        return $mobileTraffic;
    }

    public function getSessionByCountry($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $response = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:country',
                'metrics' => 'ga:sessions',
                'sort' => '-ga:sessions',
                'max-results' => $this->maxResult,
            ]
        );
        $sessionsByCountry = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'country' => $pageRow[0],
                    'sessions' => $pageRow[1],
                ];
            });
        return $sessionsByCountry;
    }


    public function getSearchEngine($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $response = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:source',
                'metrics' => 'ga:pageviews,ga:sessionDuration,ga:exits',
                'filters' => 'ga:medium==cpa,ga:medium==cpc,ga:medium==cpm,ga:medium==cpp,ga:medium==cpv,ga:medium==organic,ga:medium==ppc',
                'sort' => '-ga:pageviews'
            ]
        );
        $searchEngine = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'source' => $pageRow[0],
                    'page_views' => $pageRow[1],
                    'session_duration' => $pageRow[2],
                    'exits' => $pageRow[3],
                ];
            });
        return $searchEngine;
    }

    public function getTopContent($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $response = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:pagePath',
                'metrics' => 'ga:pageviews,ga:uniquePageviews,ga:timeOnPage,ga:bounces,ga:entrances,ga:exits',
                'sort' => '-ga:pageviews',
                'max-results' => $this->maxResult

            ]
        );
        $topContent = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'page' => $pageRow[0],
                    'page_views' => $pageRow[1],
                    'unique_page_views' => $pageRow[2],
                    'time_on_page' => $pageRow[3],
                    'bounces' => $pageRow[4],
                    'entrance' => $pageRow[5],
                    'exits' => $pageRow[6],
                ];
            });
        return $topContent;
    }


    public function getTopLandingPages($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $topLandingPages = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:landingPagePath',
                'metrics' => 'ga:entrances,ga:bounces',
                'sort' => '-ga:entrances'
            ]
        );
        $topLandingPages = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'landing_page' => $pageRow[0],
                    'bounces' => $pageRow[2],
                    'entrance' => $pageRow[1],
                ];
            });
        return $topLandingPages;
    }

    public function getKeyWords($period, $unit = 'days')
    {
        $period = $this->getPeriod($period, $unit);
        $topLandingPages = Analytics::performQuery(
            ($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:keyword',
                'metrics' => 'ga:sessions',
                'sort' => '-ga:sessions',
            ]
        );
        $keyWords = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'key_words' => $pageRow[0],
                    'sessions' => $pageRow[1],
                ];
            });
        return $keyWords;
    }

    public function getPeriod($duration, $unit)
    {
        $startDate = null;
        $now = Carbon::now();
        switch ($unit) {
            case 'days':
                $now = Carbon::now();
                $startDate = $now->subDays($duration);
                break;

            case 'month':
                $startDate = $now->subDays(30);
                break;

            case 'year':
                $startDate = $now->subYears($duration);
                break;
        }
        return Period::create($startDate, $now);
    }

    public function getRealTimeUser()
    {
        return Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
    }

    public function getAllUser($duration){
        $users = Analytics::performQuery(
            Period::days($duration),
            'ga:users'
        );
        return $users;
    }

    public function sessionByCountry($duration=7){
        $session = Analytics::performQuery(
            Period::days($duration),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:country'
            ]
        );
        return $session;
    }

}
