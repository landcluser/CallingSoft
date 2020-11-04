<?php

use App\Models\Messages\Participant;
use App\User;
use Illuminate\Database\Seeder;
use App\Models\Messages\Thread;

class ThreadsTableSeeder extends Seeder
{
    protected $admins = ['masud@youthfireit.com', 'info@youthfireit.com'];
    public function makeAdminPrivates($users, $owner)
    {
        foreach($users as $user){
            $thread = Thread::create();
            $owners = collect([$owner->id, $user->id]);
            $owner->participants()->create([
                'thread_id' => $thread->id
            ]);
            $user->participants()->create([
                'thread_id' => $thread->id
            ]);
            $num = rand(5,20);
            // for($x = 0; $x <= $num; $x++){
            //     factory(App\Models\Messages\Message::class)->create([
            //         'thread_id' => $thread->id,
            //         'owner_id' => $owners->random(),
            //         'owner_type' => 'App\User'
            //     ]);
            // }
        }
    }

    public function makeAdminGroupParticipant($admins, $thread)
    {
        foreach($admins as $admin){
            $admin->participants()->create([
                'thread_id' => $thread->id,
                'admin' => 1
            ]);
        }
    }

    public function run()
    {
        $all = User::all();
        $super = $all->where('email', 'masud@youthfireit.com')->first();
        $super2 = $all->where('email', 'info@youthfireit.com')->first();
        $this->makeAdminPrivates($all->whereNotIn('email', ['masud@youthfireit.com', 'info@youthfireit.com']), $super);
        $this->makeAdminPrivates($all->whereNotIn('email', ['masud@youthfireit.com', 'info@youthfireit.com']), $super2);
        //make admin group thread
        // $thread = factory(App\Models\Messages\Thread::class)->create([
        //     'subject' => 'Messenger Party',
        //     'image' => '3.png'
        // ]);
        // $this->makeAdminGroupParticipant($all->whereIn('email', $this->admins), $thread);
        // $all->whereNotIn('email', $this->admins)->each(function ($user) use($thread){
        //     $user->participants()->create([
        //         'thread_id' => $thread->id
        //     ]);
        // });
        // for($x = 0; $x <= 40; $x++){
        //     factory(App\Models\Messages\Message::class)->create([
        //         'thread_id' => $thread->id,
        //         'owner_id' => $all->whereIn('email', $this->admins)->random()->id,
        //         'owner_type' => 'App\User'
        //     ]);
        // }
    }
}
