<?php

interface BookInterface
{
    public function open();

    public function turnPage();
}


interface eReaderInterface 
{
    public function turnOn();

    public function pressNextButton();
}


class eReaderAdapter implements BookInterface
{
    private $eReader;

    public function __construct(eReaderInterface $eReader)
    {
        $this->eReader = $eReader;
    }


    public function open()
    {
        return $this->eReader->turnOn();
    }


    public function turnPage()
    {
        return $this->eReader->pressNextButton();
    }
}


class Book implements BookInterface
{
    public function open()
    {
        var_dump('opening paper book');
    }


    public function turnPage()
    {
        var_dump('turning page of paper book');
    }
}


class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('turn on the Kindle');
    }

    public function pressNextButton()
    {
        var_dump('press next button on kindle');
    }
}


class Nook implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('turn on the Nook');
    }

    public function pressNextButton()
    {
        var_dump('press next button on Nook');
    }
}


class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}


(new Person)->read(new Book);
(new Person)->read(new eReaderAdapter(new Kindle));
(new Person)->read(new eReaderAdapter(new Nook));