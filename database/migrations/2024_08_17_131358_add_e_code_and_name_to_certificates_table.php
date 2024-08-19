<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddECodeAndNameToCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->string('e_code', 10)->default(null)->nullable();
            $table->string('nace_code', 10)->default(null)->nullable();
            $table->text('scope_name')->default(null)->nullable();
        });

        $clients = Client::with('scope', 'certificates')->get();
        foreach ($clients as $client) {
            $certificates = $client->certificates;
            $scope = $client->scope;
            foreach ($certificates as $certificate) {
                $certificate->e_code = $scope->code;
                $certificate->nace_code = $client->nace_code;
                $certificate->scope_name = $scope->name;
                $certificate->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('e_code');
            $table->dropColumn('nace_code');
            $table->dropColumn('scope_name');
        });
    }
}
