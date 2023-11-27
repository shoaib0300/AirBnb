<?php 
    require 'Classes/Database.php';
    class Room{
        private $db;
        public function __construct(){
            $instance = Database::getInstance();
            $this->db = $instance->getConnection();
        } 
        public function createRoom($formParams){
            $this->sendRoomDataDB($formParams);
        }
        function getDate($date) {
            $timestamp = strtotime($date);
            $date_formated = date('Y-m-d', $timestamp);
            return $date_formated;
        }
        public function sendRoomDataDB($formParams){
            $sql = "INSERT INTO rooms (owner_id, room_number, price, location, number_of_guests, available, available_from, available_to) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $formParams['owner_id'],
                $formParams['Rnumber'],
                $formParams['Rprice'],
                $formParams['Rlocation'],
                $formParams['guests'],
                $formParams['ravailabel'],
                $formParams['from-date'],
                $formParams['to-date']
            ]);
            echo "Room Created Succesfully";
            header("Location: index.php");
        }
        public function getRoomsFromDB(){
            $sql = "SELECT * FROM rooms";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rooms as $room) {
                $room_data[] = [ 
                    'room_id' => $room['room_id'],
                    'owner_id' => $room['owner_id'],
                    'room_number' => $room['room_number'],
                    'room_price' => $room['price'],
                    'location' => $room['location'],
                    'number_of_guests' => $room['number_of_guests'],
                    'available' => $room['available'],
                    'available_from' => $room['available_from'],
                    'available_to' => $room['available_to']
                ]; 
            }
            return $room_data;        
        }
        public function deleteRoom($id){
            $sql = "DELETE FROM rooms WHERE room_id=?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            header("Location: index.php");  
        }
        public function getSingleRoom($id){
            $sql = "SELECT * FROM rooms WHERE room_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $room = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $room;
        }
        public function updateRoom($data){
            $sql = "UPDATE rooms SET room_number=:room_number, price=:price, location=:location, number_of_guests=:number_of_guests, available=:available,
            available_from=:available_from, available_to=:available_to WHERE room_id=:room_id LIMIT 1";
            $data = [
                ':room_number' => $data['room_number'],
                ':price' => $data['price'],
                ':location' => $data['location'],
                ':number_of_guests' => $data['number_of_guests'],
                ':available' => $data['available'],
                ':available_from' => $data['available_from'],
                ':available_to' => $data['available_to'],
                ':room_id' => $data['room_id']
            ];
            $stmt = $this->db->prepare($sql);
            $query_execute = $stmt->execute($data);
            if($query_execute){
                header("Refresh: room-edit.php?id=".$data[':room_id']);
                echo "Updated Successfully";
            }
        }        
    }
?>
