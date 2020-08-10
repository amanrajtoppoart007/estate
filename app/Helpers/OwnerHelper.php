<?php
if (!function_exists('get_owner_notifications'))
{
  function get_owner_notifications()
  {
      $user = request()->user();

        // Limit the number of returned notifications, or return all
        $query = $user->unreadNotifications();
        $limit = (int) request()->input('limit', 3);
        if ($limit) {
            $query = $query->limit($limit);
        }

        $notifications = $query->get()->each(function ($n) {
            $n->created = $n->created_at->toIso8601String();
        });

        $total = $user->unreadNotifications->count();

        return compact('notifications', 'total');
  }
}
