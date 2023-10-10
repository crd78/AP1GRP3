// src/Controller/PrestationsController.php
namespace App\Controller;

use App\Entity\prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationsController extends AbstractController
{
    /**
     * @Route("/prestations", name="prestations")
     */
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();

            $prestations = $request->request->get('prestations');

            if (!empty($prestations)) {
                // Créez une entité prestation pour chaque prestation sélectionnée
                foreach ($prestations as $libellePrestation) {
                    $prestation = new prestation();
                    $prestation->setLibellePrestation($libellePrestation);
                    // Ajoutez d'autres propriétés en conséquence

                    $entityManager->persist($prestation);
                }

                $entityManager->flush();

                $this->addFlash('success', 'Les données ont été envoyées avec succès.');

                // Rediriger vers une autre page après soumission réussie
                return $this->redirectToRoute('prestations');
            } else {
                $this->addFlash('error', 'Veuillez sélectionner au moins une prestation.');
            }
        }

        return $this->render('prestations/index.html.twig');
    }
}