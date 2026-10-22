<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;
use Illuminate\Support\Str;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $guests = [
            // Table 1 - The White Rose
            ['guest_name' => 'Ms. Devonna Coke', 'first_name' => 'Devonna', 'last_name' => 'Coke', 'phone' => '9142181055', 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Diamond Dare', 'first_name' => 'Diamond', 'last_name' => 'Dare', 'phone' => '4047109519', 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '2', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Aba Egyin', 'first_name' => 'Aba', 'last_name' => 'Egyin', 'phone' => '9292285299', 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Kristen Keller', 'first_name' => 'Kristen', 'last_name' => 'Keller', 'phone' => '9179231688', 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Erik Michael', 'first_name' => 'Erik', 'last_name' => 'Michael', 'phone' => null, 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '5', 'type' => 'Linked', 'primary_guest' => 'Mrs. Marsha Michael'],
            ['guest_name' => 'Mrs. Marsha Michael', 'first_name' => 'Marsha', 'last_name' => 'Michael', 'phone' => null, 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '6', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Otis Michael', 'first_name' => 'Otis', 'last_name' => 'Michael', 'phone' => null, 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '7', 'type' => 'Linked', 'primary_guest' => 'Mrs. Marsha Michael'],
            ['guest_name' => 'Ms. Chole Williams', 'first_name' => 'Chole', 'last_name' => 'Williams', 'phone' => null, 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '8', 'type' => 'Linked', 'primary_guest' => 'Mr. Traveice Williams'],
            ['guest_name' => 'Mr. Traveice Williams', 'first_name' => 'Traveice', 'last_name' => 'Williams', 'phone' => '9592577233', 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Ayana Young', 'first_name' => 'Ayana', 'last_name' => 'Young', 'phone' => null, 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '10', 'type' => 'Guest', 'primary_guest' => 'Mr. Richard Young'],
            ['guest_name' => 'Mr. Richard Young', 'first_name' => 'Richard', 'last_name' => 'Young', 'phone' => '3479986033', 'table_name' => 'The White Rose', 'table_number' => '1', 'seat_number' => '11', 'type' => 'Primary'],

            // Table 2 - The Alstroemeria
            ['guest_name' => 'Mr. David Arzola', 'first_name' => 'David', 'last_name' => 'Arzola', 'phone' => '3477014507', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Cheyenne Brown', 'first_name' => 'Cheyenne', 'last_name' => 'Brown', 'phone' => null, 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '2', 'type' => 'Guest', 'primary_guest' => 'Mr. Keanu Stewart'],
            ['guest_name' => 'Ms. Cynthia Garcia', 'first_name' => 'Cynthia', 'last_name' => 'Garcia', 'phone' => '9178549264', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Jarid Plummer', 'first_name' => 'Jarid', 'last_name' => 'Plummer', 'phone' => '9145898073', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '4', 'type' => 'Linked', 'primary_guest' => 'Mrs. Dianne Plummer/Golding'],
            ['guest_name' => 'Ms. Gayon Newsome', 'first_name' => 'Gayon', 'last_name' => 'Newsome', 'phone' => '3473161869', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '5', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Andrea Pinnock', 'first_name' => 'Andrea', 'last_name' => 'Pinnock', 'phone' => '9145621691', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '6', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Craig Philip', 'first_name' => 'Craig', 'last_name' => 'Philip', 'phone' => '9143460079', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Keith Roseboro', 'first_name' => 'Keith', 'last_name' => 'Roseboro', 'phone' => '6464674797', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '8', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Keanu Stewart', 'first_name' => 'Keanu', 'last_name' => 'Stewart', 'phone' => '9142826995', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Lisa Vassellgreen', 'first_name' => 'Lisa', 'last_name' => 'Vassellgreen', 'phone' => null, 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '10', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Nicolas Vassellgreen', 'first_name' => 'Nicolas', 'last_name' => 'Vassellgreen', 'phone' => null, 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '11', 'type' => 'Linked'],
            ['guest_name' => 'Ms. Anaja Pinnock-Williams', 'first_name' => 'Anaja', 'last_name' => 'Pinnock-Williams', 'phone' => '9148158286', 'table_name' => 'The Alstroemeria', 'table_number' => '2', 'seat_number' => '12', 'type' => 'Primary'],

            // Table 3 - The Lisianthus
            ['guest_name' => 'Mrs. Aileen Baker-Doran', 'first_name' => 'Aileen', 'last_name' => 'Baker-Doran', 'phone' => '9176228091', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Sean Baker-Doran', 'first_name' => 'Sean', 'last_name' => 'Baker-Doran', 'phone' => '9176628091', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '2', 'type' => 'Linked', 'primary_guest' => 'Mrs. Aileen Baker-Doran'],
            ['guest_name' => 'Mr. Cosley Buckley', 'first_name' => 'Cosley', 'last_name' => 'Buckley', 'phone' => '9177534669', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '3', 'type' => 'Linked', 'primary_guest' => 'Mrs. Heather Buckley-Smith'],
            ['guest_name' => 'Mrs. Heather Buckley-Smith', 'first_name' => 'Heather', 'last_name' => 'Buckley-Smith', 'phone' => '3474532010', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Marilyn Douglas', 'first_name' => 'Marilyn', 'last_name' => 'Douglas', 'phone' => '9149242568', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '5', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Marvin Howard', 'first_name' => 'Marvin', 'last_name' => 'Howard', 'phone' => '9149124212', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '6', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Shawyn Howard', 'first_name' => 'Shawyn', 'last_name' => 'Howard', 'phone' => '9148825432', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '7', 'type' => 'Linked', 'primary_guest' => 'Mr. Marvin Howard'],
            ['guest_name' => 'Mrs. Margaret Martinez', 'first_name' => 'Margaret', 'last_name' => 'Martinez', 'phone' => '9143306617', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '8', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Laurie Norman', 'first_name' => 'Laurie', 'last_name' => 'Norman', 'phone' => '9143306840', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Ken Redcross', 'first_name' => 'Ken', 'last_name' => 'Redcross', 'phone' => null, 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '10', 'type' => 'Linked', 'primary_guest' => 'Mrs. Natalie Redcross'],
            ['guest_name' => 'Mrs. Natalie Redcross', 'first_name' => 'Natalie', 'last_name' => 'Redcross', 'phone' => '9144147764', 'table_name' => 'The Lisianthus', 'table_number' => '3', 'seat_number' => '11', 'type' => 'Primary'],

            // Table 4 - The Mini Calla
            ['guest_name' => 'Ms. Natiesha Bennet', 'first_name' => 'Natiesha', 'last_name' => 'Bennet', 'phone' => '9143295481', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Loreen Brown', 'first_name' => 'Loreen', 'last_name' => 'Brown', 'phone' => '9142308414', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '2', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Thaniel Douglas-Morgan', 'first_name' => 'Thaniel', 'last_name' => 'Douglas-Morgan', 'phone' => '9149794379', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Stacey-Ann Douglas', 'first_name' => 'Stacey-Ann', 'last_name' => 'Douglas', 'phone' => '9142605943', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Gianni Douglas', 'first_name' => 'Gianni', 'last_name' => 'Douglas', 'phone' => null, 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '5', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Kayon Grant', 'first_name' => 'Kayon', 'last_name' => 'Grant', 'phone' => null, 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '6', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Nicola Douglas-Grant', 'first_name' => 'Nicola', 'last_name' => 'Douglas-Grant', 'phone' => '9146026514', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Ms. D’jenai Hall', 'first_name' => 'D’jenai', 'last_name' => 'Hall', 'phone' => '9145622580', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '8', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Sandra Hall', 'first_name' => 'Sandra', 'last_name' => 'Hall', 'phone' => '9145136381', 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Ariyon Morgan', 'first_name' => 'Ariyon', 'last_name' => 'Morgan', 'phone' => null, 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '10', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Kirk Morgan', 'first_name' => 'Kirk', 'last_name' => 'Morgan', 'phone' => null, 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '11', 'type' => 'Linked'],
            ['guest_name' => 'Ms. Savanna Morgan', 'first_name' => 'Savanna', 'last_name' => 'Morgan', 'phone' => null, 'table_name' => 'The Mini Calla', 'table_number' => '4', 'seat_number' => '12', 'type' => 'Linked'],

            // Table 5 - The Aster
            ['guest_name' => 'Ms. Akilah Cassells-Thomas', 'first_name' => 'Akilah', 'last_name' => 'Cassells-Thomas', 'phone' => '9142552257', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Thurman Thomas', 'first_name' => 'Thurman', 'last_name' => 'Thomas', 'phone' => null, 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '2', 'type' => 'Linked', 'primary_guest' => 'Ms. Akilah Cassells-Thomas'],
            ['guest_name' => 'Mr. Keith Mc Nair', 'first_name' => 'Keith', 'last_name' => 'Mc Nair', 'phone' => '9145620765', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '3', 'type' => 'Linked'],
            ['guest_name' => 'Ms. Denise Matthews', 'first_name' => 'Denise', 'last_name' => 'Matthews', 'phone' => '9145620765', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Jermaine Roseboro', 'first_name' => 'Jermaine', 'last_name' => 'Roseboro', 'phone' => '9145139208', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '5', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Shiela Roseboro', 'first_name' => 'Shiela', 'last_name' => 'Roseboro', 'phone' => '9145139208', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '6', 'type' => 'Linked', 'primary_guest' => 'Mr. Jermaine Roseboro'],
            ['guest_name' => 'Ms. Linda Smith', 'first_name' => 'Linda', 'last_name' => 'Smith', 'phone' => '9148432858', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Steve Moyer', 'first_name' => 'Steve', 'last_name' => 'Moyer', 'phone' => null, 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '8', 'type' => 'Guest', 'primary_guest' => 'Ms. Linda Smith'],
            ['guest_name' => 'Mr. Lee Wiltshire', 'first_name' => 'Lee', 'last_name' => 'Wiltshire', 'phone' => null, 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '9', 'type' => 'Linked', 'primary_guest' => 'Mrs. Soynzi Wiltshire'],
            ['guest_name' => 'Mrs. Soynzi Wiltshire', 'first_name' => 'Soynzi', 'last_name' => 'Wiltshire', 'phone' => '9142085508', 'table_name' => 'The Aster', 'table_number' => '5', 'seat_number' => '10', 'type' => 'Primary'],

            // Table 6 - The Snapdragon
            ['guest_name' => 'Mr. Damian Barrett', 'first_name' => 'Damian', 'last_name' => 'Barrett', 'phone' => '9148157370', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Kim Barrett', 'first_name' => 'Kim', 'last_name' => 'Barrett', 'phone' => null, 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '2', 'type' => 'Guest', 'primary_guest' => 'Mr. Damian Barrett'],
            ['guest_name' => 'Mrs. Gwynn Cassidy', 'first_name' => 'Gwynn', 'last_name' => 'Cassidy', 'phone' => null, 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '3', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Jeremiah Silkowski', 'first_name' => 'Jeremiah', 'last_name' => 'Silkowski', 'phone' => '9145362720', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Anthony Mayo', 'first_name' => 'Anthony', 'last_name' => 'Mayo', 'phone' => '9172995008', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '5', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Alicia Mayo', 'first_name' => 'Alicia', 'last_name' => 'Mayo', 'phone' => '9172995008', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '6', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Herb Golding', 'first_name' => 'Herb', 'last_name' => 'Golding', 'phone' => '9179403662', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Charmaine Golding', 'first_name' => 'Charmaine', 'last_name' => 'Golding', 'phone' => '9175927881', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '8', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Roderick Chambers', 'first_name' => 'Roderick', 'last_name' => 'Chambers', 'phone' => '9319221239', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '9', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Colette Vincent-Chambers', 'first_name' => 'Colette', 'last_name' => 'Vincent-Chambers', 'phone' => '9319221239', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '10', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Donovan Vincent', 'first_name' => 'Donovan', 'last_name' => 'Vincent', 'phone' => '6467720576', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '11', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Rebecca Vincent', 'first_name' => 'Rebecca', 'last_name' => 'Vincent', 'phone' => '6467610273', 'table_name' => 'The Snapdragon', 'table_number' => '6', 'seat_number' => '12', 'type' => 'Primary'],

            // Table 7 - The Stock Flower
            ['guest_name' => 'Mr. Eddie Nazario', 'first_name' => 'Eddie', 'last_name' => 'Nazario', 'phone' => '6465059446', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Veronique Nazario', 'first_name' => 'Veronique', 'last_name' => 'Nazario', 'phone' => null, 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '2', 'type' => 'Linked', 'primary_guest' => 'Mr. Eddie Nazario'],
            ['guest_name' => 'Mrs. Karen Sterling/Smith', 'first_name' => 'Karen', 'last_name' => 'Sterling/Smith', 'phone' => '6782708644', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Martin Sterling', 'first_name' => 'Martin', 'last_name' => 'Sterling', 'phone' => '9148432479', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Marvin Sterling', 'first_name' => 'Marvin', 'last_name' => 'Sterling', 'phone' => null, 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '5', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Naomi Sterling', 'first_name' => 'Naomi', 'last_name' => 'Sterling', 'phone' => '2039477704', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '6', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Michael Sterling', 'first_name' => 'Michael', 'last_name' => 'Sterling', 'phone' => '9145258541', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Thelma Sterling', 'first_name' => 'Thelma', 'last_name' => 'Sterling', 'phone' => null, 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '8', 'type' => 'Linked'],
            ['guest_name' => 'Ms. Marsha Dwyer', 'first_name' => 'Marsha', 'last_name' => 'Dwyer', 'phone' => '9146433826', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Megan Salter', 'first_name' => 'Megan', 'last_name' => 'Salter', 'phone' => '9143165017', 'table_name' => 'The Stock Flower', 'table_number' => '7', 'seat_number' => '10', 'type' => 'Primary'],

            // Table 8 - The Cymbidium Orchid
            ['guest_name' => 'Errol Burke', 'first_name' => 'Errol', 'last_name' => 'Burke', 'phone' => '3477400413', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '1', 'type' => 'Guest', 'primary_guest' => 'Ms. Camille Vincent'],
            ['guest_name' => 'Antonette Morgan', 'first_name' => 'Antonette', 'last_name' => 'Morgan', 'phone' => null, 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '2', 'type' => 'Guest', 'primary_guest' => 'Mr. Everton Vincent'],
            ['guest_name' => 'Ms. Meggy Scarlett', 'first_name' => 'Meggy', 'last_name' => 'Scarlett', 'phone' => '9143165898', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Shereice Scarlett', 'first_name' => 'Shereice', 'last_name' => 'Scarlett', 'phone' => null, 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '4', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Everton Vincent', 'first_name' => 'Everton', 'last_name' => 'Vincent', 'phone' => '3472474544', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '5', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Calvin Bryan', 'first_name' => 'Calvin', 'last_name' => 'Bryan', 'phone' => null, 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '6', 'type' => 'Linked'],
            ['guest_name' => 'Ms. Annella Vincent', 'first_name' => 'Annella', 'last_name' => 'Vincent', 'phone' => '3473239373', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Camille Vincent', 'first_name' => 'Camille', 'last_name' => 'Vincent', 'phone' => '3477400413', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '8', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Henry Vincent', 'first_name' => 'Henry', 'last_name' => 'Vincent', 'phone' => '3474532010', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Millie Vincent', 'first_name' => 'Millie', 'last_name' => 'Vincent', 'phone' => '3473239373', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '10', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Shernett Vincent', 'first_name' => 'Shernett', 'last_name' => 'Vincent', 'phone' => '16316451303', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '11', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Winston Vincent', 'first_name' => 'Winston', 'last_name' => 'Vincent', 'phone' => '3472757383', 'table_name' => 'The Cymbidium Orchid', 'table_number' => '8', 'seat_number' => '12', 'type' => 'Primary'],

            // Table 9 - The Garden Hydrangea
            ['guest_name' => 'Ms. Deanna Brown', 'first_name' => 'Deanna', 'last_name' => 'Brown', 'phone' => '9178537947', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Danielle Buckley', 'first_name' => 'Danielle', 'last_name' => 'Buckley', 'phone' => '3474092371', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '2', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Kimberly Suazo', 'first_name' => 'Kimberly', 'last_name' => 'Suazo', 'phone' => '6465208874', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Daryl Vincent', 'first_name' => 'Daryl', 'last_name' => 'Vincent', 'phone' => '3473239373', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Janelyn Marte', 'first_name' => 'Janelyn', 'last_name' => 'Marte', 'phone' => '12016820137', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '5', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Rosie Vincent', 'first_name' => 'Rosie', 'last_name' => 'Vincent', 'phone' => '3477059338', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '6', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Paula Smith', 'first_name' => 'Paula', 'last_name' => 'Smith', 'phone' => '3474395288', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Dayeska Machado', 'first_name' => 'Dayeska', 'last_name' => 'Machado', 'phone' => '3479021776', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '8', 'type' => 'Primary'],
            ['guest_name' => 'Steven Faynkikh', 'first_name' => 'Steven', 'last_name' => 'Faynkikh', 'phone' => null, 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '9', 'type' => 'Guest', 'primary_guest' => 'Ms. Dayeska Machado'],
            ['guest_name' => 'James Scott', 'first_name' => 'James', 'last_name' => 'Scott', 'phone' => null, 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '10', 'type' => 'Guest', 'primary_guest' => 'Ms. Jessica Terranova'],
            ['guest_name' => 'Ms. Jessica Terranova', 'first_name' => 'Jessica', 'last_name' => 'Terranova', 'phone' => '3478163627', 'table_name' => 'The Garden Hydrangea', 'table_number' => '9', 'seat_number' => '11', 'type' => 'Primary'],

            // Table 10 - The Dahlia
            ['guest_name' => 'Mr. Donald Golding Sr.', 'first_name' => 'Donald', 'last_name' => 'Golding', 'phone' => '9146254357', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '1', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Lurline Golding', 'first_name' => 'Lurline', 'last_name' => 'Golding', 'phone' => null, 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '2', 'type' => 'Linked'],
            ['guest_name' => 'Mr. Michael Golding', 'first_name' => 'Michael', 'last_name' => 'Golding', 'phone' => '9145638844', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '3', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Michelle Morehead', 'first_name' => 'Michelle', 'last_name' => 'Morehead', 'phone' => '9143100598', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '4', 'type' => 'Primary'],
            ['guest_name' => 'Mrs. Julie Proctor', 'first_name' => 'Julie', 'last_name' => 'Proctor', 'phone' => '9148431633', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '5', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Kevin Proctor', 'first_name' => 'Kevin', 'last_name' => 'Proctor', 'phone' => null, 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '6', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Alicia Vincent', 'first_name' => 'Alicia', 'last_name' => 'Vincent', 'phone' => '6463453304', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '7', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Ben Vincent', 'first_name' => 'Ben', 'last_name' => 'Vincent', 'phone' => '6462475121', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '8', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Angela Willoughby', 'first_name' => 'Angela', 'last_name' => 'Willoughby', 'phone' => '9148825955', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '9', 'type' => 'Primary'],
            ['guest_name' => 'Ms. Michelle Willoughby', 'first_name' => 'Michelle', 'last_name' => 'Willoughby', 'phone' => '3473103993', 'table_name' => 'The Dahlia', 'table_number' => '10', 'seat_number' => '10', 'type' => 'Primary'],

            // Table 11 - Dais (Host table)
            ['guest_name' => 'Ms. Amber-Elaine Golding', 'first_name' => 'Amber-Elaine', 'last_name' => 'Golding', 'phone' => null, 'table_name' => 'Dais', 'table_number' => '11', 'seat_number' => '1', 'type' => 'Linked'],
            ['guest_name' => 'Mrs. Dianne Plummer/Golding', 'first_name' => 'Dianne', 'last_name' => 'Plummer/Golding', 'phone' => '9148790649', 'table_name' => 'Dais', 'table_number' => '11', 'seat_number' => '2', 'type' => 'Primary'],
            ['guest_name' => 'Mr. Donald Golding', 'first_name' => 'Donald', 'last_name' => 'Golding', 'phone' => '9174465646', 'table_name' => 'Dais', 'table_number' => '11', 'seat_number' => '3', 'type' => 'Linked'],
        ];

        foreach ($guests as $guest) {
            Guest::create($guest);
        }
    }
}