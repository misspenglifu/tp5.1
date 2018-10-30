<?php
namespace app\admin\controller;

class Member extends Common
{
    public  function  member_list()
    {




      return view('member_list');
    }

    public  function  member_del()
    {




        return view('member_del');
    }

    public  function  member_level()
    {




        return view('member_level');
    }
    public  function  member_add()
    {




        return view('member_add');
    }
    public  function  member_edit()
    {




        return view('member_edit');
    }
    public  function  member_password()
    {




        return view('member_password');
    }


}