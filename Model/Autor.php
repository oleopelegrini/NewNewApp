<?php
namespace NEWNEWAPP\Model;

use NEWNEWAPP\DAO\AutorDAO;
use Exception;

final class Autor extends Model
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

    public ?string $CPF
    {
        set
        {
            if (empty($value) || strlen($value) !== 11)
                throw new Exception("CPF inválido.");

            $this->CPF = $value;
        }

        get => $this->CPF ?? null;
    }

    public ?string $Data_Nascimento
    {
        set
        {
            if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $value))
                throw new Exception("Data de nascimento deve estar no formato YYYY-MM-DD.");

            $this->Data_Nascimento = $value;
        }

        get => $this->Data_Nascimento ?? null;
    }

    function save(): Autor
    {
        return (new AutorDAO())->save($this);
    }

    function getById(int $id): ?Autor
    {
        return (new AutorDAO())->selectById($id);
    }

    function getAllRows(): array
    {
        return (new AutorDAO())->select();
    }

    function delete(int $id): bool
    {
        return (new AutorDAO())->delete($id);
    }
}
?>
