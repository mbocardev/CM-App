<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Services\UserService;
use App\Modules\Customer\Services\CustomerService;
use App\Modules\Supplier\Services\SupplierService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;
    protected $customerService;
    protected $supplierService;

    public function __construct(UserService $userService, CustomerService $customerService, SupplierService $supplierService)
    {
        $this->userService = $userService;
        $this->customerService = $customerService;
        $this->supplierService = $supplierService;
    }

    
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users'));
    }

   
    public function show($id)
    {
        $user = $this->userService->getUserById($id);
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        return response()->json($user);
    }

    
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'type' => 'required|in:admin,supplier,customer', // Validation pour enum
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('users.create')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        try {
            $user = $this->userService->createUser($request->all());
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.create')->with('error', 'Failed to create user');
        }
    }

    public function createCustomer()
    {
        return view('customers.create');
    }

    public function storeCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('customers.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $customer = $this->customerService->createCustomer($request->all());
            return redirect()->route('customers.index')->with('success', 'Customer created successfully');
        } catch (\Exception $e) {
            return redirect()->route('customers.create')->with('error', 'Failed to create customer');
        }
    }

    public function createSupplier()
    {
        return view('suppliers.create');
    }

    public function storeSupplier(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('suppliers.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $supplier = $this->supplierService->createSupplier($request->all());
            return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.create')->with('error', 'Failed to create supplier');
        }
    }

    // Affiche le formulaire d'édition d'un utilisateur
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        return view('users.edit', compact('user'));
    }

    // Met à jour les informations d'un utilisateur
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'telephone' => 'sometimes|required|string|max:20',
            'type' => 'sometimes|required|in:admin,supplier,customer', // Validation pour enum
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }
    
        try {
            $this->userService->updateUser($id, $request->all());
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.edit', $id)->with('error', 'Failed to update user');
        }
    }

    // Supprime un utilisateur
    public function destroy($id)
    {
        try {
            $this->userService->deleteUser($id);
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to delete user');
        }
    }
}
 