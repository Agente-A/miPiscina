<?php

namespace Tests\Feature;

use App\Piscina;
use App\Medicion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PiscinaModuleTest extends TestCase
{

    /** @test */
    public function muestra_piscinas_index()
    {
        // Volver a correr el seeder de piscina para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=PiscinaSeeder'); 

        factory(Piscina::class)->create([
            'nombre'    =>  'Piscina A',
            'condicion' =>  '1'
        ]);

        factory(Piscina::class)->create([
            'nombre'    =>  'Piscina B', 
            'condicion' =>  '3'
        ]);

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Piscina A')
            ->assertSee('Piscina B');
    }

    /** @test */
    public function mensaje_default_no_piscinas_index()
    {
        Piscina::truncate();
        
        $this->get('/')
        ->assertStatus(200)
        ->assertSee('No hay piscinas registradas');

        $this->assertEquals(0, Piscina::count());
    }

    /** @test */
    public function detalles_piscina()
    {
        Piscina::truncate(); 
        

        $piscina = factory(Piscina::class)->create([
            'id_piscina'    =>  '1',
            'nombre'        =>  'Piscina A',
            'id_raspberry'  =>  '1'
        ]);

        $this->get("/piscina/{$piscina->id_piscina}/administrar")
            ->assertStatus(200)
            ->assertSee('Piscina A');
    }

    /** @test */
    public function muestra_mediciones()
    {
        Piscina::truncate(); 
        Medicion::truncate();
        
        $piscina = factory(Piscina::class)->create([
            'id_piscina'    =>  '1',
            'nombre'        =>  'Piscina A',
            'id_raspberry'  =>  '1'
        ]);

        factory(Medicion::class)->create([
            'id_raspberry'  =>  '1',
            'cloro'         =>  '1.5',
            'ph'            =>  '7'
        ]);

        $this->get("/piscina/{$piscina->id_piscina}/administrar")
            ->assertStatus(200)
            ->assertSee('Piscina A')
            ->assertSee('1.5')
            ->assertSee('7');
    }
    
    /** @test */
    public function crear_piscina()
    {
        Piscina::truncate();
        $this->post('/piscina/', [
            'nom'       =>  'Piscina A',
            'tamano'    =>  '1234',
            'sensor'    =>  '1'
        ])->assertRedirect(route('index'));

        $this->assertDatabaseHas('Piscina',[
            'NOMBRE' => 'Piscina A',
            'TAMANO' => '1234',
            'ID_RASPBERRY' => '1',
        ]);
    }

    /** @test */
    public function nombre_obligatorio()
    {
        Piscina::truncate();
        $this->from(route('piscina.create'))
            ->post('/piscina/', [
            'nom'       =>  '',
            'tamano'    =>  '1234',
            'sensor'    =>  '1'
        ])  ->assertRedirect(route('piscina.create'))
            ->assertSessionHasErrors([
                'nom'      =>  'El campo nombre es obligatorio!'
            ]);

        $this->assertEquals(0, Piscina::count());
    }

    /** @test */
    public function tamano_obligatorio()
    {
        Piscina::truncate();
        $this->from(route('piscina.create'))
            ->post('/piscina/', [
            'nom'       =>  'Piscina A',
            'tamano'    =>  '',
            'sensor'    =>  '1'
        ])  ->assertRedirect(route('piscina.create'))
            ->assertSessionHasErrors([
                'tamano'      =>  'El campo tamaño es obligatorio!'
            ]);

        $this->assertEquals(0, Piscina::count());
    }

    /** @test */
    public function sensor_obligatorio()
    {
        Piscina::truncate();
        $this->from(route('piscina.create'))
            ->post('/piscina/', [
            'nom'       =>  'Piscina A',
            'tamano'    =>  '1234',
            'sensor'    =>  ''
        ])  ->assertRedirect(route('piscina.create'))
            ->assertSessionHasErrors([
                'sensor'      =>  'El campo sensor es obligatorio!'
            ]);

        $this->assertEquals(0, Piscina::count());
    }

    /** @test */
    public function eliminar_piscina()
    {
        Piscina::truncate();
        $piscina = factory(Piscina::class)->create([
            'id_piscina'    =>  '1',
            'nombre'        =>  'Piscina A',
            'id_raspberry'  =>  '1'
        ]);

        $this->delete(route('Piscina.destroy',$piscina->id_piscina))
            ->assertRedirect(route('index'));

        $this->assertDatabaseMissing('piscina', [
            'ID_PISCINA' => $piscina->id_piscina
            ]);
    }
    
}
