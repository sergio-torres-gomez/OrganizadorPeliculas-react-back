<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ActoresAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('nombre', TextType::class);
        $form->add('foto', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('nombre');
    }

    protected function configureListFields(ListMapper $list): void
    {


        $j = '{"page":1,"results":[{"adult":false,"backdrop_path":"/s3TBrRGB1iav7gFOCNx3H31MoES.jpg","genre_ids":[28,878,12],"id":27205,"original_language":"en","original_title":"Inception","overview":"Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another persons idea into a targets subconscious.","popularity":144.649,"poster_path":"/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg","release_date":"2010-07-15","title":"Inception","video":false,"vote_average":8.3,"vote_count":29923},{"adult":false,"backdrop_path":"/sABMpHRCmt7qg9q6AFbZ1jPU1Jf.jpg","genre_ids":[16,28,53,878],"id":64956,"original_language":"en","original_title":"Inception: The Cobol Job","overview":"The Cobol Job is a fourteen-minute animated prequel to Christopher Nolan’s award-winning movie: Inception, detailing the heist on Mr. Kanedas mind by Nash, Cobb, Arthur, and several Cobol Engineering thugs.","popularity":8.491,"poster_path":"/sNxqwtyHMNQwKWoFYDqcYTui5Ok.jpg","release_date":"2010-12-07","title":"Inception: The Cobol Job","video":false,"vote_average":7.3,"vote_count":264},{"adult":false,"backdrop_path":null,"genre_ids":[],"id":869658,"original_language":"en","original_title":"Inception","overview":"Dom Cobb (Leonardo DiCaprio) is a thief with the rare ability to enter peoples dreams and steal their secrets from their subconscious. His skill has made him a hot commodity in the world of corporate espionage but has also cost him everything he loves. Cobb gets a chance at redemption when he is offered a seemingly impossible task: Plant an idea in someones mind. If he succeeds, it will be the perfect crime, but a dangerous enemy anticipates Cobbs every move.","popularity":0.804,"poster_path":null,"release_date":"","title":"Inception","video":false,"vote_average":0,"vote_count":0},{"adult":false,"backdrop_path":null,"genre_ids":[],"id":250845,"original_language":"en","original_title":"WWA The Inception","overview":"The first World Wrestling Allstars pay per view, live from Sydney, Australia! A tournament titled \"7 Deadly Sins\", each round having a stipulation match, the winner will be crowned the first ever WWA Heavyweight Champion! Wrestlers such as Jeff Jarrett, Road Dogg, Jerry Lawler all compete in the tournament, with the WWA Commissioner, Bret Hart not too far away to make sure nothing gets to far out of hand!","popularity":1.4,"poster_path":null,"release_date":"2001-10-26","title":"WWA The Inception","video":true,"vote_average":3.1,"vote_count":5},{"adult":false,"backdrop_path":null,"genre_ids":[35],"id":542438,"original_language":"en","original_title":"Bikini Inception","overview":"Two flunky Janitors in an Arctic Lab perform unauthorized experiments transporting them to a beach dream world in Malibu California w/50 beautiful young girls and a female Brazilian PhD Student wearing only a bra and panties. A 67 Muscle car races chases horses guns fights surfing, sumo wrestler, wolf monster, underwater scenes tons of gorgeous models. Sexy sci-fi fun.","popularity":0.958,"poster_path":"/mNASlEOFX2c9upxaSbgeKFvIr1L.jpg","release_date":"2015-05-19","title":"Bikini Inception","video":false,"vote_average":7,"vote_count":1},{"adult":false,"backdrop_path":"/vYJRSrZmUcL7FPhOeCk3n6rFRRp.jpg","genre_ids":[18,9648],"id":846190,"original_language":"fa","original_title":"Aghaz","overview":"Young man (Erfan) wants to do something important,It has a lot of risk for him But he must make a decision,Though everyone around them opposes doing so,The boy decides that...","popularity":0.988,"poster_path":"/jYxQqa3ZaXhhG89YEUZkxUfKFdm.jpg","release_date":"2014-02-12","title":"Inception","video":false,"vote_average":10,"vote_count":2},{"adult":false,"backdrop_path":null,"genre_ids":[],"id":350632,"original_language":"en","original_title":"Nātyārambham","overview":"On certain Adavus: the basic steps in Bharatanatyam. The first part covers Tatta Adavu, Natta Adavu, Visharu Adavu , Tatti Metti Adavu and Teermanam Adavu.","popularity":0.6,"poster_path":null,"title":"The Inception of Dramatic Representation","video":true,"vote_average":5.8,"vote_count":3}],"total_pages":1,"total_results":7}';

        dd(json_decode($j));
        $list->addIdentifier('nombre');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('nombre');
        $show->add('foto');
    }
}