<?php

declare(strict_types=1);

use Tkui\TclTk\TkFont;
use Tkui\Widgets\Buttons\Button;
use Tkui\Widgets\Label;
use Tkui\Windows\ChildWindow;
use Tkui\Windows\Window;

require_once dirname(__FILE__) . '/LayoutWindow.php';

(new class extends LayoutWindow
{
    const WIDTH = 360;
    const HEIGHT = 180;

    public function __construct()
    {
        parent::__construct('Teste');

        $this->getWindowManager()
            ->setSize(self::WIDTH, self::HEIGHT);

        $this->buildUI();
    }

    protected function btnHelloWorld(): Button
    {
        $btn = new Button($this, 'Clique!');
        $btn->onClick(function () {
            $win_width = 260;
            $win_height = 220;

            $win = $this->newWindow('Modal window');

            $lbl = new Label($win, 'Olá, Mundo!', ['font' => new TkFont('Arial', 14, TkFont::BOLD)]);

            $win->place($lbl, [
                'width' => 120,
                'height' => 60,
                'x' => $win_width / 2 - 60,
                'y' => $win_height / 2 - 30,
            ]);
            $win->getWindowManager()->setSize($win_width, $win_height);
            $win->showModal();
        });

        return $btn;
    }

    public function newWindow(string $title,): Window
    {
        $w = new ChildWindow($this, $title);
        return $w;
    }

    protected function buildUI(): void
    {
        $this->place($this->btnHelloWorld(), [
            'width' => 80,
            'height' => 30,
            'x' => self::WIDTH / 2 - 40,
            'y' => self::HEIGHT / 2 - 15,
        ]);
    }
})->run();
