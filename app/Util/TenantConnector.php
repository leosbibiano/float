<?php
namespace App\Util;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;
class TenantConnector
{
    public static function connect(Tenant $tenant)
    {
        DB::purge('tenant');
        $config = Config::get('database.connections.main');
        $config['host'] = $tenant->host;
        $config['port'] = '3306';
        $config['database'] = $tenant->base;
        $config['username'] = $tenant->user;
        $config['password'] = $tenant->pass;
        Config::set("database.connections.tenant", $config);
    }
}
