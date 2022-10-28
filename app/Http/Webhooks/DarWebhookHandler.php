<?php
namespace App\Http\Webhooks;
// app/Http/Webhooks/MyWebhookHandler.php
Use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use App\Models\User;


class DarWebhookHandler extends WebhookHandler
{

    
    public function info() : void {

    //$this->chat->photo('https://dar.sicoep.org/img/logo.jpg')->send();

        $this->chat->photo(
            'https://dar.sicoep.org/img/logo.jpg'
        )->send();

        $this->chat->html(
        "<strong>Gracias por usar DAR! 🇬🇹</strong>\n\n<pre language='c++'>\$desarrolladores = [\n 'Carlos Daniel Ramirez', \n 'Jonathan Rustrian', \n 'Erick Mejía'\n];</pre>"
        )->send();

        $this->chat->message(
            "Más información."
            )
        ->keyboard(Keyboard::make()->buttons([
                Button::make('Página Web 🌎')->url('https://dar.sicoep.org/'),
                Button::make('Github 🐱')->url('https://github.com/ramirespinoza/sicoep'),
        ]))->send();
    
    }

    public function ayuda() : void {

        $this->chat->html(
            "<strong>Comandos disponibles:</strong>\n\n/info - Muestra información del bot\n\n/obtenertoken - Muestra el token actual\n\n/renovartoken - Renueva el token actual\n\n/ayuda - Muestra los comandos disponibles"
        )->send();
        
    }

    public function start() : void {

        

        if(User::find($this->chat->chat_id)) {


            $user = User::find($this->chat->chat_id);
            $token = $user->password;
            
            $this->chat->html(
                "<strong>Ya eres usuario del sistema DAR:</strong>\n\nUsa el siguiente token para utilizar el sistema:\n$token"
            )->send();
        } else {

            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $numbers = '0123456789';

            $token =  substr(str_shuffle($letters), 0, 4)
                .substr(str_shuffle($numbers), 0, 3)
                .substr(str_shuffle($letters), 0, 3);

            $user = User::create([
                    'chat_id' => $this->chat->chat_id,
                    'username' => $this->chat->info()['username'],
                    'password' => $token
                ]);

            $this->chat->html(
                "<strong>Bienvenido al sistema DAR:</strong>\n\nUsa el siguiente token para utilizar el sistema:\n$token"
            )->send();
        }
        
    }


    public function obtenertoken() : void {

        $user = User::find($this->chat->chat_id);
        $token = $user->password;

        
            
            $this->chat->html(
                "<strong>Gracias por usar el sistema DAR:</strong>\n\nUsa el siguiente token para utilizar el sistema:\n$token"
        
                )->send();
        
    }

    public function renovartoken() : void {

        $user = User::find($this->chat->chat_id);

        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        
        $token =  substr(str_shuffle($letters), 0, 4)
                .substr(str_shuffle($numbers), 0, 3)
                .substr(str_shuffle($letters), 0, 3);

        $user->update(['chat_id' => $this->chat->chat_id, 'username' => $this->chat->info()['username'], 'password' => $token ]);

        $this->chat->html(
            "<strong>Gracias por usar el sistema DAR:</strong>\n\nTu nuevo token para usar el sistema es:\n$token"
    
    )->send();
        
    }

}
