<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{


    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //create db configuration
        $db_name = 'crm_dinho';
        
        $db_config = config('database.connections.mysql');
        $db_config['database'] = 'crm_dinho';
    
        config(['database.connections.crm_dinho' => $db_config]);


        Schema::connection($db_name)->create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });

        Schema::connection($db_name)->create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        $user = new User();
        $user->name = 'dinho_tattoo';
        $user->schema = $db_name;
        $user->password = Hash::make('dinho1234');
        $user->email = 'test@test.com';
        $user->save();
           
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('crm.dinho')->dropIfExists('leads');
        Schema::connection('crm.dinho')->dropIfExists('services');
    }
};
