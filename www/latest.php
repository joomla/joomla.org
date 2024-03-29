<?php
// Fetch the current 3.x version from the downloads site API
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://downloads.joomla.org/api/v1/latest/cms');
$result = curl_exec($ch);
curl_close($ch);

if ($result === false)
{
    echo 'Could not fetch version data, please check your connection.' . PHP_EOL;
    exit(1);
}

$data = json_decode($result, true);

foreach ($data['branches'] as $branch)
{
    if ($branch['branch'] === 'Joomla! 4')
    {
        $version = $branch['version'];
    }
}

if (!isset($version))
{
    echo 'Joomla! 4.x version data not included in API response.' . PHP_EOL;
    exit(1);
}

$urlVersion   = str_replace('.', '-', $version);
$filename     = "Joomla_$version-Stable-Full_Package.zip";
$fullFilePath = "https://downloads.joomla.org/cms/joomla4/$urlVersion/$filename";

header("Location: $fullFilePath", true, 301);
