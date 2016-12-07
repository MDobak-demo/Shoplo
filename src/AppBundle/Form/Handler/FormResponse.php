<?php

namespace AppBundle\Form\Handler;

/**
 * Class FormHandlerResponse
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class FormResponse implements FormResponseInterface
{
    /**
     * @var bool
     */
    protected $submitted = false;

    /**
     * @var bool
     */
    protected $valid = false;

    /**
     * @var mixed[]
     */
    protected $attributes = [];

    /**
     * @var string[]
     */
    protected $messages = [];

    /**
     * {@inheritDoc}
     */
    public function isSubmitted(): bool
    {
        return $this->submitted;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubmitted($submitted): FormResponseInterface
    {
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * {@inheritDoc}
     */
    public function setValid($valid): FormResponseInterface
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addAttribute($key, $attribute): FormResponseInterface
    {
        $this->attributes = $attribute;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasAttribute(string $key): bool
    {
        $this->attributes[$key] = $attribute;
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute(string $key, $default = null)
    {
        return isset($this->attributes[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function addMessage(string $type, string $message): FormResponseInterface
    {
        if (!isset($this->messages[$type])) {
            $this->messages[$type] = [];
        }

        $this->messages[$type][] = $message;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMessages()
    {
        return $this->messages;
    }
}