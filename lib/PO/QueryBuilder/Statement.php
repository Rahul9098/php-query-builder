<?php

namespace PO\QueryBuilder;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class Statement
{
    /**
     * @param PO\QueryBuilder $builder
     */
    protected $builder;

    /**
     * @param array $params
     */
    protected $params = array();

    /**
     * @param PO\QueryBuilder\Base $builder
     */
    public function __construct(Base $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Get the query builder
     *
     * @return PO\QueryBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * Add one param to the existing collection of params
     *
     * @param mixed $param
     * @return PO\QueryBuilder\Statement
     */
    public function addParam($param)
    {
        $this->params[] = $param;
        return $this;
    }

    /**
     * Set the params. Remove old ones.
     *
     * @param array $params
     * @return PO\QueryBuilder\Statement
     */
    public function setParams(array $params)
    {
        return $this->reset()->addParams($params);
    }


    /**
     * @param mixed $param
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Add a collection of params
     *
     * @param array $params
     * @return PO\QueryBuilder\Statement
     */
    public function addParams(array $params)
    {
        foreach ($params as $param) {
            $this->addParam($param);
        }

        return $this;
    }

    /**
     * @return PO\QueryBuilder\Statement
     */
    public function reset()
    {
        $this->params = array();
        return $this;
    }

    /**
     * Informs if the query is empty
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return count($this->getParams()) === 0;
    }

    /**
     * Return the sql part of the statement
     *
     * @return string
     */
    public function toSql()
    {
        return '';
    }

    /**
     * Object to String. Alias to __toString()
     * @return string
     */
    public function toString()
    {
        return $this->toSql();
    }

    /**
     * Object to String
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}
