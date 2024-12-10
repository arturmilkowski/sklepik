<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File
{
    public static function store(Request $request, string $filepath, string $filename = ''): bool
    {
        $file = $request->file('img');
        if ($file) {
            if ($filename) {
                $path = $request->file('img')->storeAs($filepath, $filename);

                return true;
            }
            $path = $request->file('img')->store($filepath);

            return true;
        }

        return false;
    }

    public static function update(
        Request $request,
        ?string $oldImg,
        string $filepath,
        string $filename = ''
    ): bool {
        $file = $request->file('img'); // new img file
        if ($file) { // file was send
            if ($oldImg) {
                Storage::delete($oldImg); // delete old file
            }
            if ($filename) {
                $request->file('img')->storeAs($filepath, $filename);

                return true;
            }
            $request->file('img')->store($filepath); // store new file

            return true;
        }

        return false;
    }
}
