<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Entity\User;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Transaction;
use Nette;
use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    protected ORMInterface $orm;

    public function injectORM(ORMInterface $orm): void
    {
        $this->orm = $orm;
    }

    protected function createComponentUserForm(): Form
    {
        $form = new Form;
        $form->addText('name', 'Name:')
            ->setRequired();
        $form->addSubmit('submit', 'Submit');
        $form->onSuccess[] = [$this, 'userFormSucceeded'];

        return $form;
    }

    public function userFormSucceeded(Form $form, \stdClass $values): void
    {
        $user = new User();
        $user->name = $values->name;

        $tr = new Transaction($this->orm);
        $tr->persist($user);
        $tr->run();

        $this->flashMessage('User has been created.');
        $this->redirect('this');
    }

    public function renderDefault(): void
    {
        $repository = $this->orm->getRepository(User::class);

        $this->template->users = $repository->findAll();
    }
}
