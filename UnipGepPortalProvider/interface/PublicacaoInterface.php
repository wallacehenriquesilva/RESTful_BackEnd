<?php

/**
 * Interface da classe de publicação.
 * @author Wallace Silva
 * @version 1.0
 */
interface publicacaoInterface
{
    public function findAll();

    public function find();
    
    public function insert($json);

    public function update($json);

    public function delete($json);
}
?>