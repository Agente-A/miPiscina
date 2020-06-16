<?php

namespace Tests\Feature;

use App\Administrador;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminModuleTest extends TestCase
{
    /** @test */
    public function crea_nuevo_usuario()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        $this->post('/admin/', [
            'nom'   =>  'Pepito',
            'ap'    =>  'Perez',
            'email' =>  'un.correo@algo.cl',
            'pass'  =>  'contra#12',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])->assertRedirect(route('index'));

        $this->assertDatabaseHas('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl'
        ]);

        /*  Esta prueba tiene problemas porque normalmente para autenticar usuarios busca la tabla "user"
            creada con las migraciones, investigar como corregir esto para que busque en la tabla "administrador"
        $this->assertCredentials([
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl',
            'CONTRASENA'=>  'contra#12'
        ]);
        */
    }

    /** @test */
    public function nombre_obligatorio()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        $this->from(\route('admin.create'))
            ->post('/admin/', [
            'nom'   =>  '',
            'ap'    =>  'Perez',
            'email' =>  'un.correo@algo.cl',
            'pass'  =>  'contra#12',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])
        ->assertRedirect(route('admin.create'))
        ->assertSessionHasErrors([
            'nom'  =>  'El campo nombre es obligatorio!'
        ]);
        
        $this->assertDatabaseMissing('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl'
        ]);
    }

    /** @test */
    public function apellido_obligatorio()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        $this->from(\route('admin.create'))
            ->post('/admin/', [
            'nom'   =>  'Pepito',
            'ap'    =>  '',
            'email' =>  'un.correo@algo.cl',
            'pass'  =>  'contra#12',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])
        ->assertRedirect(route('admin.create'))
        ->assertSessionHasErrors([
            'ap'  =>  'El campo apellido es obligatorio!',
        ]);
        
        $this->assertDatabaseMissing('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl'
        ]);
    }    

    /** @test */
    public function correo_obligatorio()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        $this->from(\route('admin.create'))
            ->post('/admin/', [
            'nom'   =>  'Pepito',
            'ap'    =>  'Perez',
            'email' =>  '',
            'pass'  =>  'contra#12',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])
        ->assertRedirect(route('admin.create'))
        ->assertSessionHasErrors([
        'email'=>  'El campo correo es obligatorio!',
        ]);
        
        $this->assertDatabaseMissing('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl'
        ]);
    }
    
    /** @test */
    public function correo_invalido()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        $this->from(\route('admin.create'))
            ->post('/admin/', [
            'nom'   =>  'Pepito',
            'ap'    =>  'Perez',
            'email' =>  'correo-no-valido',
            'pass'  =>  'contra#12',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])
        ->assertRedirect(route('admin.create'))
        ->assertSessionHasErrors([
        'email'=>  'Por favor ingresa un correo válido',
        ]);
        
        $this->assertDatabaseMissing('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl'
        ]);
    }

    /** @test */
    public function correo_unico()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        factory(Administrador::class)->create([
            'correo' => 'pepito@algo.cl'
        ]);

        $this->from(\route('admin.create'))
            ->post('/admin/', [
            'nom'   =>  'Pepito',
            'ap'    =>  'Perez',
            'email' =>  'pepito@algo.cl',
            'pass'  =>  'contra#12',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])
        ->assertRedirect(route('admin.create'))
        ->assertSessionHasErrors([
        'email'=>  'El correo ingresado ya existe'
        ]);
        
        $this->assertDatabaseMissing('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'pepito@algo.cl'
        ]);
    }

    /** @test */
    public function contrasena_obligatorio()
    {

        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        $this->from(\route('admin.create'))
            ->post('/admin/', [
            'nom'   =>  'Pepito',
            'ap'    =>  'Perez',
            'email' =>  'un.correo@algo.cl',
            'pass'  =>  '',
            'calle' =>  'un lugar',
            'num'   =>  '123'
        ])
        ->assertRedirect(route('admin.create'))
        ->assertSessionHasErrors([
            'pass' =>  'El campo contraseña es obligatorio!'
        ]);
        
        $this->assertDatabaseMissing('ADMINISTRADOR', [
            'NOMBRE'    =>  'Pepito',
            'APELLIDO'  =>  'Perez',
            'CORREO'    =>  'un.correo@algo.cl'
        ]);
    }

    /** @test */
    public function login_exitoso()
    {
        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        factory(Administrador::class)->create([
            'correo'        =>  'correo@gmail.cl',
            'contrasena'    =>  '1234'
        ]);

        $this->assertDatabaseHas('ADMINISTRADOR', [
            'CORREO'        =>  'correo@gmail.cl',
            'CONTRASENA'    =>  '1234'
        ]);

        $admin = Administrador::where('CORREO', '=', 'correo@gmail.cl')
                        ->where('CONTRASENA', '=', '1234')
                        ->first();

        $this->post('/admin/login', [
            'email'     =>  'correo@gmail.cl',
            'password'  =>  '1234'
        ])
        ->assertRedirect(route('index'))
        ->assertSessionHas('admin', $value = $admin);
    }

    /** @test */
    public function login_correo_obligatorio()
    {
        $this->post('/admin/login', [
            'email'     =>  '',
            'password'  =>  '4321'
        ])
        ->assertRedirect(route('index'))
        ->assertSessionHasErrors('email')
        ->assertSessionMissing('admin');
    }

    /** @test */
    public function login_password_obligatorio()
    {
        $this->post('/admin/login', [
            'email'     =>  'correo@gmail.cl',
            'password'  =>  ''
        ])
        ->assertRedirect(route('index'))
        ->assertSessionHasErrors('password')
        ->assertSessionMissing('admin');
    }

    /** @test */
    public function login_fallido()
    {
        // Volver a correr el seeder de administrador para limpiar los datos y generar datos de prueba
        $this->artisan('db:seed --class=AdministradorSeeder'); 

        factory(Administrador::class)->create([
            'correo'        =>  'correo@gmail.cl',
            'contrasena'    =>  '1234'
        ]);

        $this->assertDatabaseHas('ADMINISTRADOR', [
            'CORREO'        =>  'correo@gmail.cl',
            'CONTRASENA'    =>  '1234'
        ]);

        $admin = Administrador::where('CORREO', '=', 'correo@gmail.cl')
                        ->where('CONTRASENA', '=', '1234')
                        ->first();

        $this->post('/admin/login', [
            'email'     =>  'un.correo@gmail.cl',
            'password'  =>  '4321'
        ])
        ->assertRedirect(route('index'))
        ->assertSessionHasErrors('msg')
        ->assertSessionMissing('admin');
    }
    
}
