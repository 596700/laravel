<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVulnerabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vulnerabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cve_id', 20)->unique();
            $table->string('url');
            $table->set('access_vector', ['Network', 'Adjacent', 'Local', 'Physical']);
            $table->set('access_complexity', ['Low', 'High']);
            $table->set('privileges_required', ['None', 'Low', 'High']);
            $table->set('user_interaction', ['None', 'Required']);
            $table->set('scope', ['Unchanged', 'Changed']);
            $table->set('confidentiality_impact', ['None', 'Low', 'High']);
            $table->set('integrity_impact', ['None', 'Low', 'High']);
            $table->set('availability_impact', ['None', 'Low', 'High']);
            $table->float('base_score', 3, 1);
            $table->string('cwe', 100);
            $table->text('overview');
            $table->text('solution');
            $table->text('vendor_information');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vulnerabilities');
    }
}
