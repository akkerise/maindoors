<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\Order;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $customerIds = Customer::all()->pluck('id')->toArray();
//        $orderIds = DB::table('orders')->pluck('id')->toArray();
        $limit = 20;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('orders')->insert([
                'name' => $faker->name,
                'receiver_email' => $faker->safeEmail,
                'order_code' => md5($faker->postcode),
                'payment_type' => $faker->numberBetween($min=1,$max=4),
                'payment_method' => $faker->realText($maxNbChars = 20 , $indexSize = 3),
                'total_amount' => $faker->randomNumber($nbDigits = NULL),

                'bank_code' => $faker->creditCardNumber,
                'transaction_status' => $faker->numberBetween($min=1,$max=4),
                'voucher_percent' => $faker->numberBetween($min=0,$max=100),
                'voucher_money' => $faker->numberBetween($min=1000,$max=10000000),
                'customer_id' => $faker->randomElement($customerIds),

//                Ngân Lượng field
                'transaction_info' => $faker->text(),

                'tax_amount' => $faker->numberBetween($min=1000 , $max =9999),
                'discount_amount' => $faker->numberBetween($min= 1000 , $max = 10000),
                'free_shipping' => $faker->numberBetween($min= 100 , $max = 1000),
                'order_description' => $faker->realText($maxNbChars = 200, $indexSize = 2),

                'payment_id' => $faker->numberBetween($min=10000000,$max=99999999),
                'error_text' => $faker->text,
                'secure_code' => $faker->postcode,
                'buyer_mobile' => $faker->text($maxNbChars = 10),
                'buyer_name' => $faker->name,
                'buyer_email' => $faker->safeEmail,
                'user_id' => rand(1,20),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now')
            ]);
        }
    }
}
