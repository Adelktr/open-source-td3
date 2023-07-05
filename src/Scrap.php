<?php

declare(strict_types=1);

namespace Adelktr\OpenSourceTd3;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class Scrap
{
    /**
     * @return string[]
     */

    public function fetchAllBikes(): array
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://moto.suzuki.fr/'
        );

        $content = $response->getContent();

        $crawler = new Crawler($content);

        $excludedStrings = [
            'offres',
            'Test',
            'SuzukiPass',
            'Les',
            'La',
            'pour'
        ];

        $conditions = [];
        foreach ($excludedStrings as $string) {
            $conditions[] = 'not(contains(text(), \'' . $string . '\'))';
        }

        $xpathExpression = '//body//h3[' . implode(' and ', $conditions) . ']';

        $allBikes = [];

        $crawler = $crawler->filterXPath($xpathExpression)->each(function (Crawler $node, $i) use (&$allBikes) {
            $allBikes[] = $node->text();
        });

        return $allBikes;
    }


    /**
     * @return string[]
     */
    public function fetchAllA2Bikes(): array
    { {
            $client = HttpClient::create();
            $response = $client->request(
                'GET',
                'https://moto.suzuki.fr/'
            );

            $content = $response->getContent();

            $crawler = new Crawler($content);

            $excludedStrings = [
                'offres',
                'Test',
                'SuzukiPass',
                'Les',
                'La',
                'pour'
            ];

            $conditions = [];
            foreach ($excludedStrings as $string) {
                $conditions[] = 'not(contains(text(), \'' . $string . '\'))';
            }

            $conditions[] = 'contains(text(), \'A2\')';

            $xpathExpression = '//body//h3[' . implode(' and ', $conditions) . ']';

            $allBikes = [];

            $crawler->filterXPath($xpathExpression)->each(function (Crawler $node, $i) use (&$allBikes) {
                $title = $node->text();
                if (strpos($title, 'A2') !== false) {
                    $allBikes[] = $title;
                }
            });

            return $allBikes;
        }
    }
}
