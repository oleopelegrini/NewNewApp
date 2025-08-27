<?php
namespace NEWNEWAPP\Model;

use NEWNEWAPP\DAO\CategoriaDAO;
use Exception;

final class Categoria extends Model
{
    public ?int $Id = null;

    public ?string $Descricao
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception("Descrição deve ter no mínimo 3 caracteres.");

            $this->Descricao = $value;
        }

        get => $this->Descricao ?? null;
    }

    function save(): Categoria
    {
        return (new CategoriaDAO())->save($this);
    }

    function getById(int $id): ?Categoria
    {
        return (new CategoriaDAO())->selectById($id);
    }

    function getAllRows(): array
    {
        return (new CategoriaDAO())->select();
    }

    function delete(int $id): bool
    {
        return (new CategoriaDAO())->delete($id);
    }
}
?>
