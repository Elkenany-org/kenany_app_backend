<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    
   /**
    * Run the database seeds.
   */
   
   public function run(): void
   {
        
         Setting::create([
            'option' => 'site_logo',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'site_logo_sticky',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'phone',
            'value'  => '+97455230817'
         ]);
        
         Setting::create([
            'option' => 'email',
            'value'  => 'company@company.com'
         ]);

         Setting::create([
            'option' => 'address',
            'value'  => ['en' => 'address english' ,'ar' => 'address arabic']
         ]);
         
         Setting::create([
            'option' => 'facebook',
            'value'  => 'https://www.facebook.com/'
         ]);
         
         Setting::create([
            'option' => 'twitter',
            'value'  => 'https://twitter.com/'
         ]);

         Setting::create([
            'option' => 'instagram',
            'value'  => 'https://instagram.com/'
         ]);

         Setting::create([
            'option' => 'linkedin',
            'value'  => 'https://linkedin.com/'
         ]);

         Setting::create([
            'option' => 'youtube',
            'value'  => 'https://youtube.com/'
         ]);

         Setting::create([
            'option' => 'telegram',
            'value'  => 'https://telegram.com/'
         ]);

         Setting::create([
            'option' => 'snapchat',
            'value'  => 'https://snapchat.com/'
         ]);

         Setting::create([
            'option' => 'about_section_title',
            'value'  => 'The Right People for your Business'
         ]);

         Setting::create([
            'option' => 'about_section_content',
            'value'  => 'There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou or randomised words which don look even slightly believable.'
         ]);

         Setting::create([
            'option' => 'show_section_img',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'show_section_video',
            'value'  => 'https://www.youtube.com/ed8709c2-c6bf-4933-9ecd-6f56d6aedddf'
         ]);

         Setting::create([
            'option' => 'show_section_content',
            'value'  => 'We’re Delivering only Expectional Quality Work'
         ]);

         Setting::create([
            'option' => 'about_footer_content',
            'value'  => 'There are many variation of passages of lorem ipsum available, but the majority suffered.'
         ]);

         Setting::create([
            'option' => 'about_page_image',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'about_page_title',
            'value'  => 'MAKE WEBSITES WITHOUT TOUCHING THE CODING.'
         ]);

         Setting::create([
            'option' => 'about_page_content',
            'value'  => 'We are committed to providing our customers with exceptional service while offering our employees the best training. There are many variations of passages of lorem ipsum is simply free text available in the market, but the majority have suffered time.'
         ]);

         Setting::create([
            'option' => 'contact_page_image',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'contact_page_title',
            'value'  => 'WRITE US ANY MESSAGE .'
         ]);

         Setting::create([
            'option' => 'contact_page_content',
            'value'  => 'We are committed to providing our customers with exceptional service while offering our employees the best training. There are many variations of passages of lorem ipsum is simply free text available in the market, but the majority have suffered time.'
         ]);

         Setting::create([
            'option' => 'tours_page_image',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'faq_page_image',
            'value'  => 'https://www.mintformations.co.uk/blog/wp-content/uploads/2020/05/shutterstock_583717939.jpg'
         ]);

         Setting::create([
            'option' => 'faq_page_title',
            'value'  => 'Faq Page Title'
         ]);

         Setting::create([
            'option' => 'revenue_guide_limit',
            'value'  => '5',
            'group'  => 'admin'
         ]);

         Setting::create([
            'option' => 'revenue_guide_fee',
            'value'  => '5',
            'group'  => 'admin'
         ]);

         Setting::create([
            'option' => 'revenue_ships_limit',
            'value'  => '5',
            'group'  => 'admin'
         ]);

         Setting::create([
            'option' => 'revenue_ships_fee',
            'value'  => '5',
            'group'  => 'admin'
         ]);

         Setting::create([
            'option' => 'revenue_products_limit',
            'value'  => '5',
            'group'  => 'admin'
         ]);

         Setting::create([
            'option' => 'revenue_products_fee',
            'value'  => '5',
            'group'  => 'admin'
         ]);
        
    }
    
}
