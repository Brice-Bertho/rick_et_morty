<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Sodium\add;

class CharacterController extends Controller
{
    public function characters() {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        $characters = $response['results'];
        $idNextPage = substr($response['info']['next'], 47, 1);
        $idPrevPage = substr($response['info']['prev'], 47, 1);
        print_r($response['info']['next']);
        print_r($idNextPage);
        print_r($idPrevPage);
        return view('characters', [
            'characters' => $characters,
            'idNextPage' => $idNextPage,
            'idPrevPage' => $idPrevPage,
        ]);
    }

    public function character($id) {
        $response = Http::get('https://rickandmortyapi.com/api/character/'.$id);
        $episodesUrl = $response['episode'];
        $episodes = [];
        foreach ($episodesUrl as $url) {
            $episode = Http::get($url);
            $episodes[] = $episode;
        }
        return view('character', [
            'character' => $response,
            'episodes' => $episodes
        ]);
    }

    public function lastpage() {
        $response = Http::get('https://rickandmortyapi.com/api/character/?page=42');
        $characters = $response['results'];
        $idNextPage = substr($response['info']['next'], 47, 1);
        $idPrevPage = substr($response['info']['prev'], 47, 1);
        print_r($idNextPage);
        print_r($idPrevPage);
        return view('characters', [
            'characters' => $characters,
            'idNextPage' => $idNextPage,
            'idPrevPage' => $idPrevPage,
        ]);
    }

    public function previous($id) {
        $response = Http::get('https://rickandmortyapi.com/api/character/?page='.$id);
        $characters = $response['results'];
        if ($id < 9) {
            $idNextPage = substr($response['info']['next'], 48, 1);
            $idPrevPage = substr($response['info']['prev'], 48, 1);
        } else {
            $idNextPage = substr($response['info']['next'], 48, 2);
            $idPrevPage = substr($response['info']['prev'], 48, 2);
        }

        print_r($idNextPage);
        print_r($idPrevPage);
        return view('characters', [
            'characters' => $characters,
            'idNextPage' => $idNextPage,
            'idPrevPage' => $idPrevPage,
        ]);
    }

    public function next($id) {
        $response = Http::get('https://rickandmortyapi.com/api/character/?page='.$id);
        $characters = $response['results'];
        if ($id < 9) {
            $idNextPage = substr($response['info']['next'], 48, 1);
            $idPrevPage = substr($response['info']['prev'], 48, 1);
        } else {
            $idNextPage = substr($response['info']['next'], 48, 2);
            $idPrevPage = substr($response['info']['prev'], 48, 2);
        }
        print_r($idNextPage);
        print_r($idPrevPage);
        return view('characters', [
            'characters' => $characters,
            'idNextPage' => $idNextPage,
            'idPrevPage' => $idPrevPage,
        ]);
    }
}
