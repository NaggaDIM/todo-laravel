<?php

use App\Enums\Tasks\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->enum('status', array_column(Status::cases(), 'name'))->default(Status::NEW->name);
            $table->longText('description');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
