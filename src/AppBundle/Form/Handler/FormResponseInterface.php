<?php

namespace AppBundle\Form\Handler;

/**
 * Class FormResponseInterface
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
interface FormResponseInterface
{
    const MESSAGE_SUCCESS = 'success';
    const MESSAGE_WARNING = 'warning';
    const MESSAGE_NOTICE  = 'notice';
    const MESSAGE_ERROR   = 'danger';

    /**
     * @return bool
     */
    public function isSubmitted(): bool;

    /**
     * @param bool $submitted
     *
     * @return FormResponseInterface
     */
    public function setSubmitted($submitted): FormResponseInterface;

    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @param bool $valid
     *
     * @return FormResponseInterface
     */
    public function setValid($valid): FormResponseInterface;

    /**
     * @param string $key
     * @param mixed  $attribute
     *
     * @return FormResponseInterface
     */

    public function addAttribute($key, $attribute): FormResponseInterface;

    /**
     * @param string $key
     *
     * @return bool
     */

    public function hasAttribute(string $key): bool;

    /**
     * @param string     $key
     * @param mixed|null $default;
     *
     * @return bool
     */
    public function getAttribute(string $key, $default = null);

    /**
     * @param string $type
     * @param string $message
     *
     * @return FormResponseInterface
     */
    public function addMessage(string $type, string $message): FormResponseInterface;

    /**
     * @return string[]
     */
    public function getMessages();
}