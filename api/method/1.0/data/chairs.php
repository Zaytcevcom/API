<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids        = $controller->getToArrayInt('ids');
$search     = $controller->getToStringOrNull('search');
$id_faculty = $controller->getToIntOrNull('id_faculty');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get chairs
$data = $controller->getChairs($ids, $search, $id_faculty, $count, $offset);

return $controller->success($data);

/**
 * @OA\Get(
 *  path="/data.chairs",
 *  summary="Получение информации о кафедрах университета",
 *  tags={"Data"},
 *  @OA\Parameter(
 *    name="ids",
 *    required=false,
 *    @OA\Schema(
 *      type="string"
 *    )
 *  ),
 *  @OA\Parameter(
 *    name="search",
 *    required=false,
 *    @OA\Schema(
 *      type="string"
 *    )
 *  ),
 *  @OA\Parameter(
 *    name="id_faculty",
 *    required=false,
 *    @OA\Schema(
 *      type="integer"
 *    )
 *  ),
 *  @OA\Parameter(
 *    name="count",
 *    required=false,
 *    @OA\Schema(
 *      type="integer"
 *    )
 *  ),
 *  @OA\Parameter(
 *    name="offset",
 *    required=false,
 *    @OA\Schema(
 *      type="integer"
 *    )
 *  ),
 *  @OA\Response(
 *    response=200,
 *    description="Successful operation",
 *    @OA\MediaType(
 *      mediaType="application/json",
 *    )
 *  ),
 *  @OA\Response(
 *    response=400,
 *    description="Bad Request"
 *  ),
 *  @OA\Response(
 *    response=401,
 *    description="Unauthenticated",
 *  ),
 *  @OA\Response(
 *    response=403,
 *    description="Forbidden"
 *  ),
 *  @OA\Response(
 *    response=404,
 *    description="not found"
 *  ),
 * )
 */