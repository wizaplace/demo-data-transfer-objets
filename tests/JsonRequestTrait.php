<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\KernelBrowser;

trait JsonRequestTrait
{
    public function jsonRequest(KernelBrowser $client, string $method, string $url, array $body): KernelBrowser
    {
        $client->request($method, $url, [], [], ['CONTENT_TYPE' => 'application/json'], json_encode($body));

        return $client;
    }
}