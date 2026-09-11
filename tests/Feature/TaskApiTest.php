<?php

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lista las tareas existentes', function () {
    Task::factory()->count(3)->create();

    $response = $this->getJson('/api/v1/tasks');

    $response->assertStatus(200)
        ->assertJsonCount(3, 'data');
});

it('crea una tarea nueva', function () {
    $payload = ['title' => 'Repasar rutas de Laravel'];

    $response = $this->postJson('/api/v1/tasks', $payload);

    $response->assertStatus(201)
        ->assertJsonFragment(['title' => 'Repasar rutas de Laravel']);

    $this->assertDatabaseHas('tasks', ['title' => 'Repasar rutas de Laravel']);
});

it('devuelve 404 si la tarea no existe', function () {
    $response = $this->getJson('/api/v1/tasks/999');

    $response->assertStatus(404);
});
