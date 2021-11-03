<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\FrontendRegisterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Seocontroller;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SubMenuController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//========================== Routes for Dashboard Area ======================//

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//=============== Admin Routes ==================//
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

//Routes for Categories

Route::get('/admin/all/categories', [CategoryController::class, 'categories'])->name('all.categories');
Route::get('/admin/create/category', [CategoryController::class, 'createCategory'])->name('create.category');
Route::post('/admin/store/category', [CategoryController::class, 'storeCategory'])->name('store.category');
Route::get('/admin/edit/category/{cat_id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::post('/admin/category/update',[CategoryController::class,'updateCategory'])->name('update.category');
Route::get('/admin/soft/delete/category/{id}',[CategoryController::class,'softDeleteCategory'])->name('soft.delete');
Route::get('/admin/category/trashed',[CategoryController::class,'trashedCategory'])->name('trashed.category');
Route::get('/admin/restore/category/{id}',[CategoryController::class,'reStoreCategory'])->name('restore.category');
Route::get('/admin/permanent/delete/category/{id}',[CategoryController::class,'pDeleteCategory'])->name('permanent.delete');

//Catetegory news for admin dashboard
Route::get('/admin/category/{category_slug}',[CategoryController::class,'adminCatWiseNews']);


//Routes for Divisions
Route::get('/admin/divisions', [DivisionController::class, 'divisions'])->name('divisions');
Route::get('/admin/create/division', [DivisionController::class, 'createDivision'])->name('create.division');
Route::post('/admin/store/division', [DivisionController::class, 'storeDivision'])->name('store.division');
Route::get('/admin/edit/division/{div_id}', [DivisionController::class, 'editDivisions'])->name('edit.division');
Route::post('/admin/update/division', [DivisionController::class, 'updateDivisions'])->name('update.divison');
Route::get('/admin/delete/division/{id}', [DivisionController::class, 'deleteDivisions'])->name('trash.divison');
Route::get('/admin/trashed/divisions', [DivisionController::class, 'trashedDivisions'])->name('trashed.divison');
Route::get('/admin/restore/division/{id}', [DivisionController::class, 'restoreDivisions'])->name('restore.trashed.divisions');
Route::get('/admin/permanent/delete/division/{id}', [DivisionController::class, 'pDeleteDivisions'])->name('delete.trashed.divisions');

//============= All Routes for Disctricts ==============//
Route::get('/admin/districts', [DistrictController::class, 'districts'])->name('districts');
Route::get('/admin/create/district', [DistrictController::class, 'createDistrict'])->name('create.district');
Route::post('/admin/store/district', [DistrictController::class, 'storeDistrict'])->name('store.district');
Route::get('/admin/edit/district/{dis_id}', [DistrictController::class, 'editDistrict'])->name('edit.district');
Route::post('/admin/update/district', [DistrictController::class, 'updateDistrict'])->name('update.district');
Route::get('/admin/delete/district/{id}}', [DistrictController::class, 'deleteDistrict'])->name('delete.district');
Route::get('/admin/trashed/districts', [DistrictController::class, 'trashedDistrict'])->name('trashed.district');
Route::get('/admin/restore/district/{id}', [DistrictController::class, 'restoreDistrict'])->name('restore.district');
Route::get('/admin/permanent/delete/district/{id}', [DistrictController::class, 'pDeleteDistrict'])->name('pdelete.district');


//============ Tags ================//
Route::get('/admin/tags', [TagController::class, 'tags'])->name('all.tags');
Route::get('/admin/create/tag', [TagController::class, 'createTag'])->name('create.tag');
Route::post('/admin/store/tag', [TagController::class, 'storeTag'])->name('store.tag');
Route::get('/admin/edit/tag/{tag_id}', [TagController::class, 'editTag'])->name('edit.tag');
Route::post('/admin/update/tag', [TagController::class, 'updateTag'])->name('update.tag');
Route::get('/admin/trash/tag/{id}}', [TagController::class, 'trashTag'])->name('trash.tag');
Route::get('/admin/trashed/tags', [TagController::class, 'trashedTags'])->name('trashed.tags');
Route::get('/admin/restore/tag/{id}', [TagController::class, 'restoreTag'])->name('restore.tag');
Route::get('/admin/permanent/delete/tag/{id}', [TagController::class, 'deleteTag'])->name('delete.tag');


//=================== All routes for Posts ===============//
Route::get('/admin/all/posts', [PostController::class, 'allPost'])->name('all.posts');
Route::get('/get/district/{division_id}', [PostController::class, 'GetDistrict']);
Route::get('/admin/create/new/post', [PostController::class, 'createNewPost'])->name('create.post');
Route::post('/admin/store/new/post', [PostController::class, 'storeNewPost'])->name('store.post');

Route::get('/admin/edit/post/{news_id}', [PostController::class, 'editPost'])->name('edit.post');
Route::post('/admin/update/post', [PostController::class, 'updatePost'])->name('update.post');

Route::get('/admin/delete/post/{id}', [PostController::class, 'softPost'])->name('sdelete.post');
Route::get('/admin/trashed/posts', [PostController::class, 'trashedPosts'])->name('trashed.posts');
Route::get('/admin/restore/post/{id}', [PostController::class, 'restorePost'])->name('restore.post');
Route::get('/admin/permanent/delete/post/{id}', [PostController::class, 'pdeletePost'])->name('pdelete.post');

//=================== All routes for Videos ===============//
Route::get('/admin/video/categories', [VideoController::class, 'videocategories'])->name('all.videocategories');
Route::get('/admin/create/video/category', [VideoController::class, 'videocreateCategory'])->name('create.videocategory');
Route::post('/admin/store/video/category', [VideoController::class, 'videostoreCategory'])->name('store.videocategory');
Route::get('/admin/edit/video/category/{vcat_id}', [VideoController::class, 'videoeditCategory'])->name('edit.videocategory');
Route::post('/admin/video/category/update',[VideoController::class,'videoupdateCategory'])->name('update.videocategory');
Route::get('/admin/soft/delete/video/category/{id}',[VideoController::class,'videosoftDeleteCategory'])->name('soft.videodelete');
Route::get('/admin/video/category/trashed',[VideoController::class,'videotrashedCategory'])->name('trashed.videocategory');
Route::get('/admin/restore/video/category/{id}',[VideoController::class,'videoreStoreCategory'])->name('restore.videocategory');
Route::get('/admin/permanent/delete/video/category/{id}',[VideoController::class,'videopDeleteCategory'])->name('permanent.videodelete');


Route::get('/admin/all/videos', [VideoController::class, 'allVideos'])->name('all.videos');
Route::get('/admin/add/new/video', [VideoController::class, 'addVideo'])->name('add.video');
Route::post('/admin/store/video', [VideoController::class, 'StoreVideo'])->name('store.video');
Route::get('/admin/edit/video/{video_id}', [VideoController::class, 'editVideo'])->name('edit.video');
Route::post('/admin/update/video', [VideoController::class, 'updateVideo'])->name('update.video');
Route::get('/admin/delete/video/{id}', [VideoController::class, 'softVideo'])->name('sdelete.video');
Route::get('/admin/trashed/videos', [VideoController::class, 'trashedVideos'])->name('trashed.Videos');
Route::get('/admin/restore/video/{id}', [VideoController::class, 'restoreVideo'])->name('restore.video');
Route::get('/admin/permanent/delete/video/{id}', [VideoController::class, 'pdeleteVideo'])->name('pdelete.video');

//social links update
Route::get('/admin/social/links', [SocialController::class, 'socialLinks'])->name('social.links');
Route::post('/admin/update/socials/{id}', [SocialController::class, 'SocialUpdate'])->name('social.update');

Route::get('/admin/footer/settings', [FooterController::class, 'footerSettings'])->name('footer.settings');
Route::post('/admin/footer/settings/update/{foot_id}', [FooterController::class, 'footerUpdate'])->name('footer.update');

Route::get('/admin/header/settings', [HeaderController::class, 'headerSettings'])->name('header.settings');
Route::post('/admin/header/settings/update/{head_id}', [HeaderController::class, 'headerUpdate'])->name('header.update');

//=============== SEO SEtitns ===============//
Route::get('/admin/seo/settings', [Seocontroller::class, 'seoSettings'])->name('seo.setting');
Route::post('/admin/update/seo/{id}', [SeoController::class, 'SeoUpdate'])->name('seo.update');

//===========Contact page information =============//
Route::get('/admin/settings/reach', [ContactController::class, 'reachUs'])->name('contact.settings');
Route::post('/admin/contact/update/{contact_id}', [ContactController::class, 'contactUpdadte'])->name('contact.update');
Route::post('/contact/form', [ContactController::class, 'userContactForm'])->name('contact.store');
Route::get('/admin/contact/message', [ContactController::class, 'adminMessage'])->name('admin.message');
Route::get('/admin/message/view/{msg_id}', [ContactController::class, 'viewMessage'])->name('view.message');
Route::get('/admin/message/delete/{id}', [ContactController::class, 'deleteMessage'])->name('delete.message');

//============== Live TV ===============//
Route::get('/admin/live/tv/settings', [AdminController::class, 'liveTvSettings'])->name('tv.setting');
Route::post('/admin/update/live/tv/{id}', [AdminController::class, 'LiveTvUpdate'])->name('tv.update');


//============= Routes for Menus ====================//
Route::get('/admin/menu', [MenuController::class, 'primaryMenu'])->name('primary.menu');
Route::get('/admin/create/new/menu', [MenuController::class, 'createMenu'])->name('create.menu');
Route::post('/admin/store/new/menu', [MenuController::class, 'storeMenu'])->name('store.menu');
Route::get('/admin/edit/menu/item/{menu_id}', [MenuController::class, 'editMenu'])->name('edit.menu');
Route::post('/admin/update/menu/item', [MenuController::class, 'updateMenu'])->name('update.menu');
Route::get('/admin/delete/menu/item/{id}', [MenuController::class, 'deleteMenu'])->name('delelte.menu');

//============== Routes for Sub Menus ==================//
Route::get('/admin/sub/menu', [SubMenuController::class, 'subMenu'])->name('sub.menu');
Route::get('/admin/create/sub/menu', [SubMenuController::class, 'createSubMenu'])->name('create.submenu');
Route::post('/admin/store/sub/menu', [SubMenuController::class, 'storeSubMenu'])->name('store.submenu');
Route::get('/admin/edit/submenu/item/{submenu_id}', [SubMenuController::class, 'editSubMenu'])->name('edit.submenu');
Route::post('/admin/update/submenu/item', [SubMenuController::class, 'updateSubMenu'])->name('update.submenu');
Route::get('/admin/delete/submenu/item/{id}', [SubMenuController::class, 'deleteSubMenu'])->name('delelte.submenu');

//============= User Roles ================//
Route::get('/admin/all/roles', [RoleController::class, 'index'])->name('all.roles');
Route::get('/admin/create/new/role', [RoleController::class, 'createRole'])->name('create.role');
Route::post('/admin/store/role', [RoleController::class, 'storeRole'])->name('store.role');
Route::get('/admin/edit/role/{role_id}', [RoleController::class, 'editRole'])->name('edit.role');
Route::post('/admin/update/role/', [RoleController::class, 'updateRole'])->name('update.role');
Route::get('/admin/delete/role/{id}', [RoleController::class, 'deleteRole'])->name('delete.role');

//============= Users ================//
Route::get('/admin/all/users', [UserController::class, 'index'])->name('all.users');
Route::get('/admin/create/user', [UserController::class, 'createUser'])->name('create.user');
Route::post('/admin/store/user', [UserController::class, 'storeUser'])->name('store.user');
Route::get('/admin/edit/user/{user_id}', [UserController::class, 'editUser'])->name('edit.user');
Route::post('/admin/update/user', [UserController::class, 'updateUser'])->name('update.user');
Route::get('/admin/trash/user/{id}', [UserController::class, 'sdeleteUser'])->name('sdelete.user');
Route::get('/admin/trashed/users', [UserController::class, 'trashedUsers'])->name('trashed.users');
Route::get('/admin/restore/user/{id}', [UserController::class, 'restoreUser'])->name('restore.user');
Route::get('/admin/delete/user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::get('/admin/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
Route::get('/user/password/reset/{id}', [UserController::class, 'resetPass'])->name('reset.pass');
Route::post('/user/password/update', [UserController::class, 'updatePassword'])->name('update.pass');
Route::post('/create/user', [FrontendRegisterController::class, 'FrontendRegister'])->name('front.register');

//========== Admin Update Users ==============//
Route::get('/user/edit/profile/{u_id}', [UserController::class, 'userEditprofile'])->name('user.edit.profile');
Route::post('/user/update/profile', [UserController::class, 'userUpdateprofile'])->name('user.update.profile');

//User news in admin dashboard
Route::get('/admin/user/{user_name}',[UserController::class,'adminUserWiseNews']);

//Block a user
Route::get('/admin/block/{id}',[UserController::class,'adminBlockUser'])->name('block.user');
Route::get('/admin/unblock/{id}',[UserController::class,'adminUnBlockUser'])->name('unblock.user');

//============= Advertisement Management =============
Route::get('/admin/all/adverts', [AdvertController::class, 'index'])->name('all.adverts');
Route::get('/admin/create/advert', [AdvertController::class, 'createAd'])->name('create.ad');
Route::post('/admin/store/advert', [AdvertController::class, 'storeAd'])->name('store.advert');
Route::get('/admin/edit/advert/{ad_id}', [AdvertController::class, 'editAd'])->name('edit.advert');
Route::post('/admin/update/advert', [AdvertController::class, 'updateAd'])->name('update.advert');
Route::get('/admin/delete/advert/{id}', [AdvertController::class, 'deleteAdvert'])->name('delete.advert');

//======================= Pages ===================//
Route::get('/admin/all/pages', [PageController::class, 'index'])->name('all.pages');
Route::get('/admin/create/pages', [PageController::class, 'createPage'])->name('create.page');
Route::post('/admin/store/page', [PageController::class, 'storePage'])->name('store.page');
Route::get('/admin/edit/page/{page_id}', [PageController::class, 'editPage'])->name('edit.page');
Route::post('/admin/update/page', [PageController::class, 'updatePage'])->name('update.page');
Route::get('/admin/delete/page/{id}', [PageController::class, 'deletePage'])->name('delete.page');
Route::get('/about', [IndexController::class, 'about'])->name('about.page');

Route::get('/privacy', [IndexController::class, 'privacy'])->name('privacy.page');
Route::get('/live', [IndexController::class, 'live'])->name('live.page');
Route::get('/contribute', [IndexController::class, 'contribute'])->name('contribute.page');

//======================= Google Analytics ==============//
Route::get('/admin/google/analytics', [AdminController::class, 'googleAnalytics'])->name('google.analytics');


//Routes for Frontend
Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/post/{id}/{post_slug}',[IndexController::class,'singleNews']);

//single video page
Route::get('/video/{id}',[IndexController::class,'singleVideo']);

//Category pages
Route::get('/category/{category_slug}',[IndexController::class,'catWiseNews']);

Route::get('/tag/{slug}',[IndexController::class,'tagWiseNews']);
Route::get('/video/category/{vcat_slug}',[IndexController::class,'catWisVideos']);

//Contact page
Route::get('/contact-us', [IndexController::class, 'userContact'])->name('user.cform');
//live tv

Route::get('/division/{division_slug}', [IndexController::class, 'divisionNews']);
Route::get('/division/district/{district_slug}', [IndexController::class, 'districtNews']);
Route::get('/user/{user_id}/{name}', [IndexController::class, 'userNews']);

// Route::get('/', function () {
//     return view('frontend.index');
// });

