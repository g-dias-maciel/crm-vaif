<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Leads extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'email' => 'test',
    ];

   
    protected $table = 'leads';

    protected $connection = 'mysql';


    public function __construct() {
        parent::__construct();

        $this->createConnectionConfig(Auth::user()->schema);
        $this->changeConnection(Auth::user()->schema);
    }

    protected function createConnectionConfig( string $schema): Void
    {

        $db_config = config('database.connections.mysql');
        $db_config['database'] = $schema;
    
        config(['database.connections.'.$schema => $db_config]);
    }

    protected function changeConnection(string $schema) : Void
    {
        $this->connection = $schema;
    }


}
