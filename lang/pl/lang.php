<?php
    return [
        'plugin' => [
            'name' => 'Rezerwacje',
            'description' => 'Plugin do zarządzania rezerwacjami'
        ],
        'navigation' => [
            'reservations' => [
                'label' => 'Rezerwacje',
            ],
            'client' => [
                'label' => 'Klienci',
            ],
            'reservation' => [
                'label' => 'Rezerwacje',
            ],
        ],
        'settings' => [
            'label' => 'Zarządzaj',
            'description' => 'Ustawienia pluginu Rezerwacje',
            'category' => 'Rezerwacje',
            'tab' => [
                'opening_hours' => 'Godziny otwarcia',
                'service_types' => 'Rodzaje usług',
            ],
            'section_opening_hours' => [
                'label' => 'Godziny otwarcia',
                'comment' => 'Wprowadź godziny otwarcia zakładu',
                'monday' => 'Poniedziałek',
                'tuesday' => 'Wtorek',
                'wednesday' => 'Środa',
                'thursday' => 'Czwartek',
                'friday' => 'Piątek',
                'saturday' => 'Sobota',
                'sunday' => 'Niedziela',
                'sunday_default' => 'Zamknięte',
            ],
            'section_service_types' => [
                'label' => 'Zarządzaj rodzajami usług'
            ],
            'service_type' => [
                'label' => 'Rodzaje usług',
                'prompt' => 'Dodaj rodzaj usługi',  
                'name' => 'Nazwa usługi',
                'length' => 'Długość trwania usługi',
                'price' => 'Cena usługi',
                'additional_informations' => 'Dodatkowe informacje',
            ],
        ],
        'models' => [
            'client' => [
                'first_name' => 'Imię',
            ]
        ]
    ];