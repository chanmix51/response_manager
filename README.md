Response Manager
================

What
----

The Response Manager is a small service provider for the Silex µ-framework that allow http response to be generated at the very end of the process.

Why
---

It is sometime usefull to reuse existing controllers. But if the controllers return already generated view, it is very un easy to deal with the values they had nor to extend the application behavior. With the response manager, you get a `ControllerResponse` from which you can add or remove values that will be sent to the template.

How
---

    $app->register(new ResponseManager\ControllerResponseServiceProvider());

Now, in your controllers you can do something like:

    public function controller1()
    {
        return $this->app['response_manager']->build('twig', array('path/template.html.twig', array('var1' => 'value1')));
    }

    public function controller2($something)
    {
        $response = $this->controller1();
        $response['something'] = $something;

        return $response;
    }

But you can also choose to extract the response's variable and create a new response pointing to another template. The final http response will be created after all the controllers are run. 

Note
----

Response manager comes with a handy StringControllerResponse if you do not want to use twig for your template:

    // template.txt
    Welcome {{ NAME }}.

    public function controller($name)
    {
        return $this->app['response_manager']->build('string', array(file_get_contents('template.txt'), array('name' => $name)));
    }

