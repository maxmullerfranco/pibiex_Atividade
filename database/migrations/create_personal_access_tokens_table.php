<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     * Este método será chamado quando a migração for executada.
     * Ele cria a tabela 'personal_access_tokens' caso ela ainda não exista.
     */
    public function up(): void
    {
        // Verifica se a tabela 'personal_access_tokens' já existe
        if (!Schema::hasTable('personal_access_tokens')) {
            // Cria a tabela 'personal_access_tokens'
            Schema::create('personal_access_tokens', function (Blueprint $table) {
                // Coluna 'id' do tipo auto incremento, chave primária
                $table->id();
                // Coluna 'tokenable_type' do tipo string para armazenar o tipo do modelo relacionado ao token (ex: App\Models\User)
                $table->string('tokenable_type');
                // Coluna 'tokenable_id' do tipo bigInteger para armazenar o ID do modelo relacionado ao token
                $table->bigInteger('tokenable_id');
                // Coluna 'name' do tipo string para armazenar o nome do token
                $table->string('name');
                // Coluna 'token' do tipo string com tamanho 64 para armazenar o token e que deve ser único
                $table->string('token', 64)->unique();
                // Coluna 'abilities' do tipo texto para armazenar as habilidades ou permissões associadas ao token (pode ser nula)
                $table->text('abilities')->nullable();
                // Coluna 'last_used_at' do tipo timestamp para registrar a última vez que o token foi usado (pode ser nula)
                $table->timestamp('last_used_at')->nullable();
                // Coluna 'expires_at' do tipo timestamp para registrar quando o token expira (pode ser nula)
                $table->timestamp('expires_at')->nullable();
                // Cria automaticamente as colunas 'created_at' e 'updated_at' para registrar quando o registro foi criado e atualizado
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverte as migrações.
     * Este método será chamado quando a migração for revertida.
     * Ele remove a tabela 'personal_access_tokens' do banco de dados, caso exista.
     */
    public function down(): void
    {
        // Remove a tabela 'personal_access_tokens' do banco de dados, caso exista
        Schema::dropIfExists('personal_access_tokens');
    }

};
