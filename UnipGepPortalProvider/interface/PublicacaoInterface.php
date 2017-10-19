<?php
require_once("model/PublicacaoDto.php");

/**
 * Interface da classe de publicação.
 * @author Wallace Silva
 * @version 1.0
 */
interface publicacaoInterface
{
    public function findAll();

    public function find(PublicacaoDto $publicacaoDto);

    public function insert(PublicacaoDto $publicacaoDto);

    public function update(PublicacaoDto $publicacaoDto);

    public function delete(PublicacaoDto $publicacaoDto);
}

?>