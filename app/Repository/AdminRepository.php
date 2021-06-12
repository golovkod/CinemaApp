<?php

namespace App\Repository;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Film;
use App\Models\Image;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\DB;

class AdminRepository
{
    use ImageUpload;

    /**
     * @param StoreRequest $request
     * @return Film
     */
    public function store(StoreRequest $request): Film
    {
        $info = Film::create([
            'f_name' => $request->get('f_name'),
            'f_country' => $request->get('f_country'),
            'f_res' => $request->get('f_res'),
            'f_summa' => $request->get('f_summa'),
            'f_year' => $request->get('f_year'),
            'f_date' => $request->get('f_date'),
        ]);

        $data = new Image;
        $data->i_image = $request->image;
        if ($data->i_image) {
            try {
                $filePath = $this->userImageUpload($data->i_image);
                $data->i_image = $filePath;
                $info->images()->save($data);
            } catch (Exception $e) {

            }
        }

        foreach ($request->a_name as $tag) {
            $info->actors()->attach($tag);
        }

        foreach ($request->g_name as $tag) {
            $info->generes()->attach($tag);
        }

        $info->save();
        return $info;
    }


    /**
     * @param UpdateRequest $request
     * @param Film $info
     * @param Image $data
     * @return Film
     */
    public function update(UpdateRequest $request, Film $info, Image $data): Film
    {
        $info->actors()->detach();
        $info->generes()->detach();

        $info->update([
            'f_name' => $request->f_name,
            'f_country' => $request->f_country,
            'f_res' => $request->f_res,
            'f_summa' => $request->f_summa,
            'f_year' => $request->f_year,
            'f_date' => $request->f_date,
        ]);

        $data->i_image = $request->image;
        if ($data->i_image) {
            try {
                $filePath = $this->UserImageUpload($data->i_image);
                $data->i_image = $filePath;
                $info->images()->update(['i_image' => $data->i_image]);
            } catch (Exception $e) {

            }
        }

        foreach ($request->a_name as $tag) {
            $info->actors()->attach($tag);
        }
        foreach ($request->g_name as $tag) {
            $info->generes()->attach($tag);
        }

        return $info;
    }

    /**
     * @param $f_id
     */
    public function destroy($f_id)
    {
        $info = Film::find($f_id);
        $info->generes()->detach();
        $info->actors()->detach();
        $info->images()->delete();
        $info->delete();
    }

    /**
     * @param array $year
     * @return array
     */
    public function chart($year = []): array
    {
        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }
        return $user;
    }
}
