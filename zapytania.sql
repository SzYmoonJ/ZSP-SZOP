##offers
#list -- lista ofert konkretnego użytkownika
SELECT offers.offer_name, offers.price from offers where offers.user_id="1";

#edit -- edycja oferty
UPDATE offers SET offers.offer_name="[value-1]",offers.description="[value-2]",
offers.price="[value-3]" WHERE offers.id="1";

#detailed offer -- wyświetlenie detali oferty
SELECT offers.offer_name, offers.description, offers.price from offers where offers.id="1";

#add_new_offer -- dodanie nowej oferty
INSERT INTO `offers`(`user_id`, `offer_name`, `description`, `price`) 
VALUES ('1','Sajber-PUnk2011','Świetna gra fps','150');


##orders
#bought_list -- lista moich zakupów
SELECT orders.user_id, offers.offer_name, offers.price FROM orders 
JOIN offers ON orders.offer_id=offers.id where orders.user_id="4";

#bought_item_details -- detale zakupionego przedmiotu
SELECT orders.offer_id, orders.user_id, offers.offer_name, offers.description, offers.price 
FROM orders JOIN offers ON orders.offer_id=offers.id where orders.user_id="4"
AND orders.offer_id="7";

#not_bought_items -- nie kupione przedmioty
SELECT offers.offer_name, offers.price from offers WHERE offers.id 
NOT IN (SELECT offer_id FROM orders);

#not_bought_item_detail -- detale danej nie kupionej oferty
SELECT offers.id, offers.offer_name, offers.description, offers.price from offers 
WHERE offers.id="5" AND offers.id NOT IN (SELECT offer_id FROM orders);

#buy - zakup przedmiotu
INSERT INTO orders (`offer_id`, `user_id`) VALUES ('8','3');


##users
#add_new_user -- dodaje nowego użytkownika
INSERT INTO users(`email`, `password`, `is_admin`) 
VALUES ('il@wp.pl','haslo','0');
