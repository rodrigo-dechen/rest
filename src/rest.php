<?php
namespace Rest;

abstract class Rest{

    protected $head = [];
    private $status = 200;

    final protected function status($status = null){
        if($status === null)
            return $this->status;
        return ($this->status = $status);
    }

    /**
     * @param array $_HEAD
     * @param array $_DATA
     * @return llRequest\Response
     */
    final public function request($_HEAD, $_DATA){
        $this->head = $_HEAD;
        $r = new \llRequest\Response();

        if(!method_exists(get_called_class(), $_HEAD['verbo']))
            throw new \Exception('Este verbo não foi implantado');

        $ref = new \ReflectionMethod(get_called_class(), $_HEAD['verbo']);
        if($ref->isProtected() && !$this->auth($_HEAD, $_DATA))
            throw new \Exception('Este metodo requer permição de acesso');

        /** @var \llRequest\Response $data */
        $data = $this->{$_HEAD['verbo']}($_DATA);

        if($data instanceof \llRequest\Response) return $data;
        else return $r->meta((''), $this->status())->data($data);
    }

    /**
     * @param array $_HEAD
     * @param array $_DATA
     * @return bool
     */
    protected function auth($_HEAD, $_DATA = []){
        return true;
    }

}
