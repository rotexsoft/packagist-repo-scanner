<?php
declare(strict_types=1);

namespace Rotexsoft\PackagistRepoScanner;

function getLatestStableVersionInfo(string $vendor, string $package): ?array {
    
    $url = "https://repo.packagist.org/p2/$vendor/$package.json";
    $json = @json_decode(file_get_contents($url) ?: "[]", true);

    if($json === []) { return null; }
    
    $versions = array_column($json['packages']["$vendor/$package"], 'version_normalized');

    // Filter out non-stable versions
    $stable = array_filter($versions, function ($v) {
        return preg_match('/^(?!.*(dev|alpha|beta|RC)).*$/i', $v);
    });

    if ($stable === []) { return null; }

    // Sort using version_compare
    usort($stable, 'version_compare');

    $latestStableVersion = end($stable);
    $latestStableVersionInfo = array_find(
        $json['packages']["$vendor/$package"],
        function($versionInfo) use($latestStableVersion) {
            return $versionInfo['version_normalized'] === $latestStableVersion;
        }
    );
    
    return [
        $latestStableVersion, 
        $latestStableVersionInfo['require']['php']
        ?? 
        (
            $latestStableVersionInfo['require']['php-64bit']
            ??'unknown php version'
        )
    ];
}
