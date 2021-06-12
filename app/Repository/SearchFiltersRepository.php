<?php


namespace App\Repository;

use App\Models\Film;
use Illuminate\Http\Request;

class SearchFiltersRepository
{

    /**
     * @param Request $req
     * @return mixed
     */
    public function filter(Request $req)
    {
        $info = Film::whereHas('generes', function ($query) use ($req) {
            return $req->generesId ?
                $query->where('g_id', $req->generesId) : '';
        })->where(function ($query) use ($req) {
            return $req->countryId ?
                $query->from('films')->where('f_country', $req->countryId) : '';
        })->where(function ($query) use ($req) {
            return $req->yearId ?
                $query->from('films')->where('f_year', $req->yearId) : '';
        })
            ->with('generes')
            ->sortable()
            ->paginate(8);

        return $info;
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function searchName(Request $req)
    {
        $search = $req->s;
        $info = Film::where('f_name', 'LIKE', "%{$search}%")
            ->sortable()
            ->paginate(8);
        return $info;
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function searchFilter(Request $req)
    {

        $search = $req->s;
        $info = Film::WhereHas('actors', function ($q) use ($search) {
            $q->where('a_name', 'like', '%' . $search . '%')->orWhere('f_res', 'LIKE', "%{$search}%");
        })->whereHas('generes', function ($query) use ($req) {
            return $req->generesId ?
                $query->where('g_id', $req->generesId) : '';
        })->where(function ($query) use ($req) {
            return $req->countryId ?
                $query->from('films')->where('f_country', $req->countryId) : '';
        })->where(function ($query) use ($req) {
            return $req->yearId ?
                $query->from('films')->where('f_year', $req->yearId) : '';
        })
            ->with('generes')
            ->sortable()
            ->paginate(8);
        return $info;
    }

    /**
     * @param Request $req
     * @return array
     */
    public function getSelectedId(Request $req): array
    {
        $selectedId = [];
        $selectedId['generesId'] = $req->generesId;
        $selectedId['countryId'] = $req->countryId;
        $selectedId['yearId'] = $req->yearId;
        return $selectedId;
    }
}
