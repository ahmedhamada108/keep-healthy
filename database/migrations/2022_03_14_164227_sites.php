<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function(Blueprint $table)
		{
			$table->integer('id', true)->autoIncrement();
			$table->string('image_path');
			$table->string('title');
            $table->string('content');
            $table->string('site_url');
			$table->timestamps(6);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites');

    }
}
