use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/add', function (Request $request) {
    $parameter = $request->query('parameter_name');
    var_dump($parameter);
});
