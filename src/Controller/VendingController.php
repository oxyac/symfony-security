<?php

namespace App\Controller;

//use App\DTO\LowestEnquiryDTO;
use App\DTO\Item;
use App\DTO\LowestEnquiry;
use App\Entity\Gnome;
use App\Entity\Task;
use App\Form\Type\TaskType;
use App\Service\Serializer\DTOSerializer;
use App\Service\VendingService;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class VendingController extends AbstractController
{

    private DTOSerializer $serializer;

    private VendingService $vendingService;



    public function __construct(
        DTOSerializer $DTOSerializer,
        VendingService $vendingService
    )
    {
        $this->serializer = $DTOSerializer;
        $this->vendingService = $vendingService;
    }


    #[Route('/vending/{id}/some-form', name: 'app_vendag', methods: ['POST'])]
    public function getLowest(Request $request, int $id, SerializerInterface $serializer): Response
    {
        $lowestEnquiry = $serializer->deserialize($request->getContent(), LowestEnquiry::class, 'json');

        dd($lowestEnquiry);


//        return $this->render('vending/index.html.twig', [
//            'inquiry' => $lowestEnquiry,
//        ]);
    }

    #[Route('/vending/{id}/dto', name: 'app_vending', methods: ['POST'])]
    public function getLaw(Request $request, int $id): Response
    {
        $item = $this->serializer->deserialize($request->getContent(), LowestEnquiry::class, 'json');
//
        dd($item);die;


        $response = $this->serializer->serialize($item, 'json');
        return new Response($response, 200);


//        return $this->render('vending/index.html.twig', [
//            'inquiry' => $lowestEnquiry,
//        ]);
    }

    #[Route('/vending/third-form', name: 'app_gnomes_get', methods: ['GET'])]
    public function getGnomes(ManagerRegistry $managerRegistry): Response
    {

        $gnomes = $this->vendingService->testDoctrine();

        return new Response($this->serializer->serialize($gnomes, 'json'), 200);

//        return $this->render('vending/index.html.twig', [
//            'inquiry' => $lowestEnquiry,
//        ]);
    }

    #[Route('/vending/form', name: 'app_form', methods: ['GET'])]
    public function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();

            return $this->redirectToRoute('task_success');
        }


        return $this->render('task/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

//    #[Route('/admin', name: 'task_success')]
//    public function newSecond(Request $request): Response
//    {
//        // creates a task object and initializes some data for this example
//        return new Response($request);
//    }

    #[Route('/api/admin/1', name: 'asdasd')]
    public function asdd(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        return new Response($request);
    }

    #[Route('/update', name: 'app_update')]
    public function update(LoggerInterface $logger): Response
    {
        $logger->alert('aasdsa');

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );
//        // ...
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            // do some sort of processing
//
//            $this->addFlash(
//                'notice',
//                'Your changes were saved!'
//            );
//            // $this->addFlash() is equivalent to $request->getSession()->getFlashBag()->add()
//
//            return $this->redirectToRoute(...);
//        }
//
//        return $this->render(...);

        return new Response();
    }

}


