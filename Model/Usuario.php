<?php
namespace NEWNEWAPP\Model;

use NEWNEWAPP\DAO\UsuarioDAO;
use Exception;

final class Usuario extends Model
{
    public ?int $Id = null;

    public ?string $Nome
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception("Nome deve ter no mínimo 3 caracteres.");

            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    public ?string $Email
    {
        set
        {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL))
                throw new Exception("E-mail inválido.");

            $this->Email = $value;
        }

        get => $this->Email ?? null;
    }

    public ?string $Senha
    {
        set
        {
            if (strlen($value) < 6)
                throw new Exception("A senha deve ter no mínimo 6 caracteres.");

            $this->Senha = $value;
        }

        get => $this->Senha ?? null;
    }

    function save(): Usuario
    {
        return (new UsuarioDAO())->save($this);
    }

    function getById(int $id): ?Usuario
    {
        return (new UsuarioDAO())->selectById($id);
    }

    function getAllRows(): array
    {
        return (new UsuarioDAO())->select();
    }

    function delete(int $id): bool
    {
        return (new UsuarioDAO())->delete($id);
    }
}
?>
