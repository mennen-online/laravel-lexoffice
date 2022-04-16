composer create-project laravel/laravel LaralexTest
[string]$location = Get-Location
[string]$locationTest = $location + "\LaralexTest"
[string]$location += "\Laralex"
[string]$locationesc = $location.replace("\", "\\")
[string]$locationComposer = ($locationTest + "\composer.json")
$oldjson = Get-Content .\LaralexTest\composer.json -Raw | ConvertFrom-Json

# # Write-Host $location

$pathRepo = @"
{
    "dev-package": {
        "type": "path",
        "url": "$locationesc",
        "options": {
            "symlink": true
        }
    }
}
"@


$oldjson | Add-Member -MemberType NoteProperty -Name "repositories" -Value (ConvertFrom-Json $pathRepo)

[System.IO.File]::WriteAllLines($locationComposer, (ConvertTo-Json $oldjson -Depth 10))

Set-Location $locationTest

composer require "mennen-online/laralex"

php artisan vendor:publish --tag=laralex-config 

Clear-Host
Write-Host "Done!"
Write-Host "Do not forget to configure the Laralex Config!"
